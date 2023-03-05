<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Ad\Voucher\CreateOne\CreateOneVoucher;
use App\Models\Voucher;
use App\Repository\AdminRepository;
use App\Service\AmountPerHour;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateVoucherCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CreateVoucher';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Voucher';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(CreateOneVoucher $createOneVoucher, AdminRepository $adminRepository)
    {
        if (AmountPerHour::with(1) === false) {
            $this->info('skip');
            return 0;
        }

        $admin = $adminRepository->getSuperAdmin();
        $type = rand(0, 1) ? Voucher::TypeAmount : Voucher::TypePercentage;
        if ($type === Voucher::TypePercentage) {
            $amount = rand(11, 66);
            $limit = rand(111, 333);
            $name = "$amount % off";
        } else {
            $amount = rand(1, 33);
            $limit = rand(111, 333);
            $name = "$amount off";
        }
        $createOneVoucher->run($admin, $type, $amount, $limit, Str::random(4), null, null, $name);
        $this->info('ok');
        return 0;
    }

}
