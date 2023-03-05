<?php

declare(strict_types=1);

namespace App\Ad\ProductVoucher\DeleteOne;


use App\Models\ProductVoucher;
use Illuminate\Foundation\Auth\User;

class DeleteOneProductVoucherEvent
{
    public function __construct(public User $user, public ProductVoucher $item)
    {
    }
}