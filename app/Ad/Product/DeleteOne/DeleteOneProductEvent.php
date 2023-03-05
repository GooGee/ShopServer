<?php

declare(strict_types=1);

namespace App\Ad\Product\DeleteOne;


use App\Models\Product;
use Illuminate\Foundation\Auth\User;

class DeleteOneProductEvent
{
    public function __construct(public User $user, public Product $item)
    {
    }
}