<?php
declare(strict_types=1);

namespace App\Service\Trend;

use App\Ad\Trend\CreateOne\CreateOneTrend;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Product;
use App\Models\Trend;
use App\Models\User;
use App\Repository\AdminRepository;
use App\Repository\OrderRepository;
use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateTrend
{
    public function __construct(private CreateOneTrend    $createOne,
                                private AdminRepository   $adminRepository,
                                private OrderRepository   $orderRepository,
                                private ProductRepository $productRepository,
                                private UserRepository    $userRepository,
    )
    {
    }

    function run(Command $command)
    {
        $command->info('create Trend');
        DB::transaction(function () use ($command) {
            $admin = $this->adminRepository->find(Admin::SystemId);

            $item = new Product();
            $amount = $this->productRepository->query()
                ->where('dtCreate', '<', today())
                ->count();
            $this->createOne->__invoke($admin, $amount, $item->getTable());

            $item = new User();
            $amount = $this->userRepository->query()
                ->where('dtCreate', '<', today())
                ->count();
            $this->createOne->__invoke($admin, $amount, $item->getTable());

            $item = new Order();
            $amount = $this->orderRepository->query()
                ->where('dtCreate', '<', today())
                ->count();
            $this->createOne->__invoke($admin, $amount, $item->getTable());

            $amount = $this->orderRepository->query()
                ->where('dtCreate', '<', today())
                ->where('statusPayment', Order::StatusPaymentPaid)
                ->sum('sum');
            $this->createOne->__invoke($admin, intval($amount), Trend::TypeRevenue);
        });
        $command->info('OK');
    }

}