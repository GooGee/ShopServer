<?php

declare(strict_types=1);

namespace App\Ad\Voucher\UpdateOne;


use App\Models\Voucher;
use Illuminate\Foundation\Auth\User;

class UpdateOneVoucherEvent
{
    public function __construct(public User $user, public Voucher $item)
    {
    }
}