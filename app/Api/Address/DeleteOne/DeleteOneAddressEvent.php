<?php

declare(strict_types=1);

namespace App\Api\Address\DeleteOne;


use App\Models\Address;
use Illuminate\Foundation\Auth\User;

class DeleteOneAddressEvent
{
    public function __construct(public User $user, public Address $item)
    {
    }
}