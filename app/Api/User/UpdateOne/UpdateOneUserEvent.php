<?php

declare(strict_types=1);

namespace App\Api\User\UpdateOne;


use App\Models\User;

class UpdateOneUserEvent
{
    public function __construct(public User $user, public User $item)
    {
    }
}