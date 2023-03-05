<?php

declare(strict_types=1);

namespace App\Api\Address\UpdateOne;


use App\Models\Address;
use Illuminate\Foundation\Auth\User;

class UpdateOneAddressEvent
{
    public function __construct(public User $user, public Address $item)
    {
    }
}