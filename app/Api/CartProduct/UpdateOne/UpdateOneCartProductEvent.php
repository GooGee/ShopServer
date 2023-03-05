<?php

declare(strict_types=1);

namespace App\Api\CartProduct\UpdateOne;


use App\Models\CartProduct;
use Illuminate\Foundation\Auth\User;

class UpdateOneCartProductEvent
{
    public function __construct(public User $user, public CartProduct $item)
    {
    }
}