<?php

declare(strict_types=1);

namespace App\Ad\Voucher\DeleteOne;


use App\Models\Voucher;
use Illuminate\Foundation\Auth\User;

class DeleteOneVoucherEvent
{
    public function __construct(public User $user, public Voucher $item)
    {
    }
}