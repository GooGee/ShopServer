<?php

declare(strict_types=1);

namespace App\Ad\Role\CreateOne;


use App\Models\Role;
use Illuminate\Foundation\Auth\User;

class CreateOneRoleEvent
{
    public function __construct(public User $user, public Role $item)
    {
    }
}