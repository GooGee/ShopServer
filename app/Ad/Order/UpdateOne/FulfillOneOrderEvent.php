<?php

declare(strict_types=1);

namespace App\Ad\Order\UpdateOne;

class FulfillOneOrderEvent
{

    public function __construct(\App\Models\Admin $user, \App\Models\Order $item)
    {
    }
}