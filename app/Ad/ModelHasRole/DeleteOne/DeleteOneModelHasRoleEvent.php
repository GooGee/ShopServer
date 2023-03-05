<?php

declare(strict_types=1);

namespace App\Ad\ModelHasRole\DeleteOne;


use App\Models\ModelHasRole;
use Illuminate\Foundation\Auth\User;

class DeleteOneModelHasRoleEvent
{
    public function __construct(public User $user, public ModelHasRole $item)
    {
    }
}