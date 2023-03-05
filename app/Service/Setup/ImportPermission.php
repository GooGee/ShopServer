<?php

declare(strict_types=1);

namespace App\Service\Setup;

use App\AbstractBase\AbstractImportFile;
use App\Models\Permission;
use App\Models\Role;
use App\Repository\PermissionRepository;
use App\Repository\RoleRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ImportPermission extends AbstractImportFile
{
    const File = 'resources/RolePermission.json';

    public function __construct(private PermissionRepository $repository,
                                private RoleRepository       $roleRepository)
    {
    }

    function getFile(): string
    {
        return self::File;
    }

    function run(Command $command)
    {
        DB::transaction(function () use ($command) {
            $this->import($command);
        });
    }

    function import(Command $command)
    {
        $result = $this->readJson($command);
        if (is_null($result)) {
            return;
        }

        $command->info('import permission');
        $guard_name = 'admin';
        $rpzz = [];
        Permission::unguard();
        foreach ($result as $item) {
            if ($item['module'] === 'Api') {
                continue;
            }
            $name = $item['permission'];
            $moderator = $item['entity'] . 'Moderator';
            $permission = $this->repository->query()
                ->updateOrCreate(
                    compact('name', 'guard_name'),
                    compact('name', 'guard_name', 'moderator'),
                );
            $rpzz[$moderator][] = $permission;
        }

        $command->info('import role');
        foreach ($rpzz as $name => $permissionzz) {
            /** @var Role $role */
            $role = $this->roleRepository->query()
                ->updateOrCreate(compact('name', 'guard_name'));
            $role->givePermissionTo($permissionzz);
        }
        Permission::reguard();
    }
}