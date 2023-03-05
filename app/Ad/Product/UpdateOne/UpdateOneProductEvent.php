<?php

declare(strict_types=1);

namespace App\Ad\Product\UpdateOne;


use App\Models\Product;
use Illuminate\Foundation\Auth\User;

class UpdateOneProductEvent
{
    public function __construct(public User $user, public Product $item)
    {
    }
}