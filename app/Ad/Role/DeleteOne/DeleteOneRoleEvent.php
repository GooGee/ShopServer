<?php

declare(strict_types=1);

namespace App\Ad\Role\DeleteOne;


use App\Models\Role;
use Illuminate\Foundation\Auth\User;

class DeleteOneRoleEvent
{
    public function __construct(public User $user, public Role $item)
    {
    }
}