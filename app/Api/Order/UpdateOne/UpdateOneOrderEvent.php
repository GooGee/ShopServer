<?php

declare(strict_types=1);

namespace App\Api\Order\UpdateOne;


use App\Models\Order;
use Illuminate\Foundation\Auth\User;

class UpdateOneOrderEvent
{
    public function __construct(public User $user, public Order $item)
    {
    }
}