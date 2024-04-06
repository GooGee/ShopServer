<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Ad\Order\UpdateOne\FulfillOneOrder;
use App\Models\Admin;
use App\Models\Order;
use App\Repository\AdminRepository;
use App\Repository\OrderRepository;
use Illuminate\Console\Command;

class FulfillOrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'FulfillOrder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fulfill Order';

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
    public function handle(FulfillOneOrder $fulfillOneOrder,
                           AdminRepository $adminRepository,
                           OrderRepository $repository,)
    {
        /** @var Order|null $order */
        $order = $repository->query()
            ->where('status', Order::StatusPlaced)
            ->where('statusPayment', Order::StatusPaymentPaid)
            ->where('dtPay', '<', now()->subHours(12))
            ->orderBy('id')
            ->first();
        if (isset($order)) {
            $admin = $adminRepository->getSuperAdmin();
            auth()->guard(Admin::Guard)->login($admin);
            $item = $fulfillOneOrder->__invoke($admin, $order);
            $this->info($item->id);
        }
        $this->info('OK');
        return 0;
    }

}
