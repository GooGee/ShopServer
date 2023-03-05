<?php

declare(strict_types=1);

namespace App\Api\OrderProduct\CreateOne;


use App\Models\OrderProduct;
use Illuminate\Foundation\Auth\User;

class CreateOneOrderProductEvent
{
    public function __construct(public User $user, public OrderProduct $item)
    {
    }
}