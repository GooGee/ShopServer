<?php

declare(strict_types=1);

namespace App\Api\Address\CreateOne;


use App\Models\Address;
use Illuminate\Foundation\Auth\User;

class CreateOneAddressEvent
{
    public function __construct(public User $user, public Address $item)
    {
    }
}