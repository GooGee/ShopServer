<?php

declare(strict_types=1);

namespace App\Ad\Product\CreateOne;


use App\Models\Product;
use Illuminate\Foundation\Auth\User;

class CreateOneProductEvent
{
    public function __construct(public User $user, public Product $item)
    {
    }
}