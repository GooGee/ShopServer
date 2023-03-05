<?php

declare(strict_types=1);

namespace App\Api\User\CreateOne;


use App\Models\User;

class CreateOneUserEvent
{
    public function __construct(public User $user, public User $item)
    {
    }
}