<?php

declare(strict_types=1);

namespace App\Api\Order\UpdateOne;

class ReturnOneOrderEvent
{

    public function __construct(\App\Models\User $user, \App\Models\Order $item)
    {
    }
}