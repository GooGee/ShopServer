<?php

declare(strict_types=1);

namespace App\Api\CartProduct\DeleteOne;


use App\Models\CartProduct;
use Illuminate\Foundation\Auth\User;

class DeleteOneCartProductEvent
{
    public function __construct(public User $user, public CartProduct $item)
    {
    }
}