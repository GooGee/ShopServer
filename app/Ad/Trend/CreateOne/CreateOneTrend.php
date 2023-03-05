<?php

declare(strict_types=1);

namespace App\Ad\Trend\CreateOne;

use App\Models\Admin;

use App\Models\Trend;
use App\Repository\TrendRepository;

class CreateOneTrend
{
    public function __construct(private TrendRepository $repository)
    {
    }

    function __invoke(Admin $user,

                      int $amount,
                      string $type,
    )
    {
        $item = new Trend();

        $item->amount = $amount;
        $item->type = $type;

        $item->save();
        $item->refresh();

        event(new CreateOneTrendEvent($user, $item));

        return $item;
    }

}