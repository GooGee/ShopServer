<?php

declare(strict_types=1);

namespace App\Api\CartProduct\CreateOne;


use App\Models\CartProduct;
use Illuminate\Foundation\Auth\User;

class CreateOneCartProductEvent
{
    public function __construct(public User $user, public CartProduct $item)
    {
    }
}