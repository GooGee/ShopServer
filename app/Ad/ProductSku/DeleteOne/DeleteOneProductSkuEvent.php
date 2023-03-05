<?php

declare(strict_types=1);

namespace App\Ad\ProductSku\DeleteOne;


use App\Models\ProductSku;
use Illuminate\Foundation\Auth\User;

class DeleteOneProductSkuEvent
{
    public function __construct(public User $user, public ProductSku $item)
    {
    }
}