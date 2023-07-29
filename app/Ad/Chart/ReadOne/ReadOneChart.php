<?php

declare(strict_types=1);

namespace App\Ad\Chart\ReadOne;

use App\Models\Order;
use App\Models\Product;
use App\Models\Trend;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class ReadOneChart
{
    function __invoke(int $length)
    {
        $orderzz = $this->reduceDay($this->readMany(Order::getClassName(), $length));
        $productzz = $this->reduceDay($this->readMany(Product::getClassName(), $length));
        $userzz = $this->reduceDay($this->readMany(User::getClassName(), $length));
        $revenuezz = $this->reduceDay($this->readMany(Trend::TypeRevenue, $length));

        $monthSum = $this->readSumAll();
        if ($orderzz->count()) {
            $monthSum['orderzz']->add($orderzz->first());
        }
        $monthSum['orderzz'] = $monthSum['orderzz']->reverse()->values();

        if ($productzz->count()) {
            $monthSum['productzz']->add($productzz->first());
        }
        $monthSum['productzz'] = $monthSum['productzz']->reverse()->values();

        if ($userzz->count()) {
            $monthSum['userzz']->add($userzz->first());
        }
        $monthSum['userzz'] = $monthSum['userzz']->reverse()->values();

        if ($revenuezz->count()) {
            $monthSum['revenuezz']->add($revenuezz->first());
        }
        $monthSum['revenuezz'] = $monthSum['revenuezz']->reverse()->values();

        return (object)[
            'id' => 0,
            'orderzz' => $orderzz,
            'productzz' => $productzz,
            'userzz' => $userzz,
            'revenuezz' => $revenuezz,

            'orderCount' => $this->countOrderAll(),
            'monthSum' => $monthSum,
        ];
    }

    function countOrderAll()
    {
        $date = today()->subMonth()->toDateString();
        return [
            Order::StatusPlaced => $this->countOrder(Order::StatusPlaced, $date),
            Order::StatusCancelled => $this->countOrder(Order::StatusCancelled, $date),
            Order::StatusFulfilled => $this->countOrder(Order::StatusFulfilled, $date),
            Order::StatusReceived => $this->countOrder(Order::StatusReceived, $date),
            Order::StatusReturned => $this->countOrder(Order::StatusReturned, $date),
        ];
    }

    function countOrder(string $status, string $date)
    {
        return Order::query()
            ->where('status', $status)
            ->whereNull('dtDelete')
            ->where('dtCreate', '>', $date)
            ->count();
    }

    function readMany(string $type, int $length): Collection
    {
        return Trend::query()
            ->where('type', $type)
            ->whereNull('dtDelete')
            ->take($length)
            ->orderByDesc('id')
            ->get();
    }

    function readSumAll()
    {
        $date = today()->day(1)->subYear()->toDateString();
        return [
            'orderzz' => $this->reduceDay($this->readSum(Order::getClassName(), $date)),
            'productzz' => $this->reduceDay($this->readSum(Product::getClassName(), $date)),
            'userzz' => $this->reduceDay($this->readSum(User::getClassName(), $date)),
            'revenuezz' => $this->reduceDay($this->readSum(Trend::TypeRevenue, $date)),
        ];
    }

    function readSum(string $type, string $date): Collection
    {
        $tcc = Trend::query()
            ->select(\DB::raw('Min(id) id'))
            ->where('type', $type)
            ->whereNull('dtDelete')
            ->where('dtCreate', '>', $date)
            ->groupBy(\DB::raw('Year(dtCreate), Month(dtCreate)'))
            ->orderByDesc('id')
            ->take(12)
            ->get();
        return Trend::query()
            ->where('type', $type)
            ->whereNull('dtDelete')
            ->whereIn('id', $tcc->pluck('id'))
            ->get();
    }

    function reduceDay(Collection $cc)
    {
        foreach ($cc as $item) {
            $item->dtCreate = $item->dtCreate->subDay();
        }
        return $cc;
    }
}
