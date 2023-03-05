<?php

declare(strict_types=1);

namespace App\Ad\Chart\ReadOne;

use App\Models\Order;
use App\Models\Product;
use App\Models\Trend;
use App\Models\User;
use App\Repository\TrendRepository;

class ReadOneChart
{
    public function __construct(private TrendRepository $trendRepository)
    {
    }

    function __invoke(int $length)
    {
        return (object)[
            'id' => 0,
            'orderzz' => $this->readMany(Order::getClassName(), $length),
            'productzz' => $this->readMany(Product::getClassName(), $length),
            'userzz' => $this->readMany(User::getClassName(), $length),
            'revenuezz' => $this->readMany(Trend::TypeRevenue, $length),
        ];
    }

    function readMany(string $type, int $length)
    {
        return $this->trendRepository->query()
            ->where('type', $type)
            ->take($length)
            ->orderBy('id', 'desc')
            ->get();
    }
}