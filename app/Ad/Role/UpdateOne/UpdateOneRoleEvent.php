<?php

declare(strict_types=1);

namespace App\Ad\Role\UpdateOne;


use App\Models\Role;
use Illuminate\Foundation\Auth\User;

class UpdateOneRoleEvent
{
    public function __construct(public User $user, public Role $item)
    {
    }
}