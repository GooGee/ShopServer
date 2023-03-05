<?php

declare(strict_types=1);

namespace App\Ad\User\UpdateOne;


use App\Models\Admin;
use App\Models\User;

class UpdateOneUserEvent
{
    public function __construct(public Admin $user, public User $item)
    {
    }
}