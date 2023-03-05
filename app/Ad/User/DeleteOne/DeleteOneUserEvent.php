<?php

declare(strict_types=1);

namespace App\Ad\User\DeleteOne;


use App\Models\Admin;
use App\Models\User;

class DeleteOneUserEvent
{
    public function __construct(public Admin $user, public User $item)
    {
    }
}