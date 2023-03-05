<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Api\Order\UpdateOne\PayOneOrder;
use App\Models\Order;
use App\Repository\OrderRepository;
use App\Service\AmountPerHour;
use Illuminate\Console\Command;

class PayOrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'PayOrder {--s}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pay Order';

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
    public function handle(PayOneOrder $payOneOrder, OrderRepository $repository,)
    {
        if ($this->option('s')) {
            $total = $repository->query()->count();
            // pay 3/4 order
            if (AmountPerHour::after($total) === false || rand(0, 3) === 0) {
                $this->info('skip');
                return 0;
            }
        }

        $order = $repository->query()
            ->where('status', Order::StatusPlaced)
            ->where('statusPayment', Order::StatusPaymentUnpaid)
            ->inRandomOrder()
            ->first();
        if (isset($order)) {
            auth()->login($order->user);
            $item = $payOneOrder->run($order->user, $order);
            $this->info($item->id);
        }
        $this->info('OK');
        return 0;
    }

}
