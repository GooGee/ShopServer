<?php

declare(strict_types=1);

namespace App\Ad\ModelHasPermission\DeleteOne;


use App\Models\ModelHasPermission;
use Illuminate\Foundation\Auth\User;

class DeleteOneModelHasPermissionEvent
{
    public function __construct(public User $user, public ModelHasPermission $item)
    {
    }
}