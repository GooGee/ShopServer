<?php

declare(strict_types=1);

namespace App\Api\Order\CreateOne;


use App\Models\Order;
use Illuminate\Foundation\Auth\User;

class CreateOneOrderEvent
{
    public function __construct(public User $user, public Order $item)
    {
    }
}