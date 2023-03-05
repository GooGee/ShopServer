<?php

declare(strict_types=1);

namespace App\Ad\ProductSku\CreateOne;


use App\Models\ProductSku;
use Illuminate\Foundation\Auth\User;

class CreateOneProductSkuEvent
{
    public function __construct(public User $user, public ProductSku $item)
    {
    }
}