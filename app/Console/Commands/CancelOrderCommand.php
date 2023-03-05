<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Ad\Order\UpdateOne\CancelOneOrder;
use App\Models\Admin;
use App\Models\Order;
use App\Repository\AdminRepository;
use App\Repository\OrderRepository;
use App\Service\AmountPerHour;
use Illuminate\Console\Command;

class CancelOrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CancelOrder {--s}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cancel Order';

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
    public function handle(CancelOneOrder  $cancelOneOrder,
                           AdminRepository $adminRepository,
                           OrderRepository $repository,)
    {
        $total = $repository->query()->count();
        // cancel 1/4 order
        if (AmountPerHour::after($total) === false || rand(0, 3)) {
            $this->info('skip');
            return 0;
        }

        $order = $repository->query()
            ->where('status', Order::StatusPlaced)
            ->where('statusPayment', Order::StatusPaymentUnpaid)
            ->inRandomOrder()
            ->first();
        if (isset($order)) {
            $admin = $adminRepository->getSuperAdmin();
            auth()->guard(Admin::Guard)->login($admin);
            $item = $cancelOneOrder->__invoke($admin, $order);
            $this->info($item->id);
        }
        $this->info('OK');
        return 0;
    }

}
