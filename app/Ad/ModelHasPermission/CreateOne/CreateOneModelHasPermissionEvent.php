<?php

declare(strict_types=1);

namespace App\Ad\ModelHasPermission\CreateOne;


use App\Models\ModelHasPermission;
use Illuminate\Foundation\Auth\User;

class CreateOneModelHasPermissionEvent
{
    public function __construct(public User $user, public ModelHasPermission $item)
    {
    }
}