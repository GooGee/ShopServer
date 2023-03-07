<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Api\Order\UpdateOne\ReceiveOneOrder;
use App\Api\Order\UpdateOne\ReturnOneOrder;
use App\Models\Order;
use App\Repository\OrderRepository;
use App\Service\AmountPerHour;
use Illuminate\Console\Command;

class ReceiveOrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ReceiveOrder {--s}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Receive Order';

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
    public function handle(ReceiveOneOrder $receiveOneOrder,
                           ReturnOneOrder  $returnOneOrder,
                           OrderRepository $repository,)
    {
        if ($this->option('s')) {
            $total = $repository->query()->count();
            if (AmountPerHour::after($total) === false) {
                $this->info('skip');
                return 0;
            }
        }

        $order = $repository->query()
            ->where('status', Order::StatusFulfilled)
            ->where('statusPayment', Order::StatusPaymentPaid)
            ->where('dtFulfill', '<', now()->subHours(12))
            ->inRandomOrder()
            ->first();
        if (isset($order)) {
            auth()->login($order->user);
            $result = rand(0, 5);
            if ($result === 0) { // Return 1/6 order
                $this->info('ReturnOneOrder');
                $item = $returnOneOrder->__invoke($order->user, $order);
                $this->info($item->id);
            } else if ($result & 1) { // Receive 3/6 order
                $this->info('ReceiveOneOrder');
                $item = $receiveOneOrder->__invoke($order->user, $order);
                $this->info($item->id);
            }
        }
        $this->info('OK');
        return 0;
    }

}
