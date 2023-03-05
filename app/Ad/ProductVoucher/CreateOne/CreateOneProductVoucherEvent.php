<?php

declare(strict_types=1);

namespace App\Ad\ProductVoucher\CreateOne;


use App\Models\ProductVoucher;
use Illuminate\Foundation\Auth\User;

class CreateOneProductVoucherEvent
{
    public function __construct(public User $user, public ProductVoucher $item)
    {
    }
}