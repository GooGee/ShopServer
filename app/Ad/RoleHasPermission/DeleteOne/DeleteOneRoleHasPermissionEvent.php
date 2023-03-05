<?php

declare(strict_types=1);

namespace App\Ad\RoleHasPermission\DeleteOne;


use App\Models\RoleHasPermission;
use Illuminate\Foundation\Auth\User;

class DeleteOneRoleHasPermissionEvent
{
    public function __construct(public User $user, public RoleHasPermission $item)
    {
    }
}