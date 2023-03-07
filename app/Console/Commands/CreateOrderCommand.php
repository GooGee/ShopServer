<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Api\CartProduct\CreateOne\CreateOneCartProduct;
use App\Api\Order\CreateOne\CreateOneOrderService;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Repository\OrderRepository;
use App\Repository\ProductSkuRepository;
use App\Repository\UserRepository;
use App\Service\AmountPerHour;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class CreateOrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CreateOrder {amount=1} {--s}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Order';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(private CreateOneCartProduct  $createOneCartProduct,
                                private CreateOneOrderService $createOneOrderService,
    )
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(OrderRepository $repository, ProductSkuRepository $productSkuRepository, UserRepository $userRepository,)
    {
        if ($this->option('s')) {
            $total = $repository->query()->count();
            if (AmountPerHour::after($total) === false) {
                $this->info('skip');
                return 0;
            }
        }

        $amount = intval($this->argument('amount'));
        if ($amount === 0) {
            $amount = 1;
        }

        /** @var \App\Models\User[] $usercc */
        $usercc = $userRepository->query()
            ->with('addresszz')
            ->whereNull('dtDelete')
            ->inRandomOrder()
            ->take($amount)
            ->get();

        $cc = $productSkuRepository->query()
            ->select(['id', 'price'])
            ->whereNull('dtDelete')
            ->where('stock', '>', 0)
            ->inRandomOrder()
            ->take(33)
            ->get();

        foreach ($usercc as $user) {
            auth()->login($user);
            $this->createOrder($user, $cc->random(rand(1, 3)), $amount === 1);
        }

        $this->info('OK');
        return 0;
    }

    /**
     * @param User $user
     * @param Product[] $productzz
     * @param bool $single
     * @return void
     * @throws \Exception
     */
    private function createOrder(User $user, iterable $productzz, bool $single)
    {
        $this->info('add product to cart');
        foreach ($productzz as $product) {
            $amount = 1;
            if ($product->price < 1e7) {
                $amount = rand(1, 3);
            }
            if ($product->price < 1e6) {
                $amount = rand(1, 11);
            }
            $this->createOneCartProduct->__invoke($user, $product->id, $amount);
        }

        $this->info('create an order');
        if (count($user->addresszz)) {
            $address = $user->addresszz[0];
        } else {
            throw new \Exception("User $user->id does not have an address");
        }

        $order = $this->createOneOrderService->run($user, $address->id);
        $this->info($order->id);

        // create an order by scheduled task
        if ($single) {
            return;
        }

        $this->info('for yesterday');
        // create many orders of yesterday
        $dt = today();
        $dt->subDay();
        $dt->setHour(rand(11, 22));
        $dt->setMinute(rand(0, 59));
        $dt->setSecond(rand(0, 59));
        $order->dtCreate = $dt->clone();
        $order->dtExpire = $dt->clone()->addHours(22);
        if (rand(0, 3) === 0) {
            $order->statusPayment = Order::StatusPaymentUnpaid;
            $order->status = Arr::random([Order::StatusPlaced, Order::StatusCancelled]);

            if ($order->status === Order::StatusCancelled) {
                $order->dtCancel = $dt->addMinutes(rand(1, 33));
            }
        } else {
            $order->statusPayment = Order::StatusPaymentPaid;
            $order->status = Arr::random([Order::StatusPlaced, Order::StatusFulfilled, Order::StatusReceived, Order::StatusReturned]);

            $order->dtPay = $dt->addMinutes(rand(1, 33))->clone();
            if ($order->status === Order::StatusFulfilled) {
                $order->dtFulfill = $dt->addDays(1)->clone();
            }
            if ($order->status === Order::StatusReceived) {
                $order->dtFulfill = $dt->addDays(1)->clone();
                $order->dtReceive = $dt->addDays(rand(1, 3));
            }
            if ($order->status === Order::StatusReturned) {
                $order->dtFulfill = $dt->addDays(1)->clone();
                $order->dtReturn = $dt->addDays(rand(1, 3));
            }
        }
        $order->save();
    }
}
