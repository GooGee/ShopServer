<?php

declare(strict_types=1);

namespace App\Ad\ProductSku\UpdateOne;


use App\Models\ProductSku;
use Illuminate\Foundation\Auth\User;

class UpdateOneProductSkuEvent
{
    public function __construct(public User $user, public ProductSku $item)
    {
    }
}