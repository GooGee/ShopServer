<?php

declare(strict_types=1);

namespace App\Ad\Voucher\CreateOne;


use App\Models\Voucher;
use Illuminate\Foundation\Auth\User;

class CreateOneVoucherEvent
{
    public function __construct(public User $user, public Voucher $item)
    {
    }
}