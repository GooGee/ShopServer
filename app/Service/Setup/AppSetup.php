<?php

declare(strict_types=1);

namespace App\Service\Setup;

use App\Repository\AdminRepository;
use App\Repository\RoleRepository;
use App\Service\Shopee\ImportCategory;
use Illuminate\Console\Command;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AppSetup
{
    use WithoutModelEvents;

    const LockFile = 'setup.lock';

    public function __construct(private ImportCategory   $importCategory,
                                private ImportCountry    $importCountry,
                                private ImportPermission $importPermission,
                                private ImportTag        $importTag,
                                private AlterTable       $alterTable,
                                private AdminRepository  $adminRepository,
                                private RoleRepository   $roleRepository,
                                private CreateIndex      $createIndex,
    )
    {
    }

    public function run(Command $command)
    {
        if ($this->lock($command)) {
            $this->alterTable->run();

            DB::transaction(function () use ($command) {
                $this->importPermission->import($command);

                $this->adminRepository->createSystem();
                $admin = $this->adminRepository->createSuperAdmin($command->argument('password'));
                $admin->assignRole($this->roleRepository->query()->get()->all());

                $this->importCategory->run($command);
                $this->importCountry->run($command);
                $this->importTag->run($command);
            });

            $this->createIndex->run($command);
        }
        $command->info('ok');
    }

    private function lock(Command $command)
    {
        if (app()->isLocal()) {
            return true;
        }

        $storage = Storage::disk('root');
        if ($storage->exists(self::LockFile)) {
            $command->error(self::LockFile . ' already exists. Delete the file to run again.');
            return false;
        }

        $command->info(self::LockFile);
        $storage->put(self::LockFile, now()->toDateTimeLocalString());
        return true;
    }
}
