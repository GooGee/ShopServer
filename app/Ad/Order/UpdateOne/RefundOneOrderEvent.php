<?php

declare(strict_types=1);

namespace App\Ad\Order\UpdateOne;

class RefundOneOrderEvent
{

    public function __construct(public \App\Models\Admin $user, public \App\Models\Order $item)
    {
    }
}