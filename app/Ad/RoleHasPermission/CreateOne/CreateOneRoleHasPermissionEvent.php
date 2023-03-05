<?php

declare(strict_types=1);

namespace App\Ad\RoleHasPermission\CreateOne;


use App\Models\RoleHasPermission;
use Illuminate\Foundation\Auth\User;

class CreateOneRoleHasPermissionEvent
{
    public function __construct(public User $user, public RoleHasPermission $item)
    {
    }
}