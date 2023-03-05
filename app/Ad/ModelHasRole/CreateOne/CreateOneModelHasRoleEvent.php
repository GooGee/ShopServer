<?php

declare(strict_types=1);

namespace App\Ad\ModelHasRole\CreateOne;


use App\Models\ModelHasRole;
use Illuminate\Foundation\Auth\User;

class CreateOneModelHasRoleEvent
{
    public function __construct(public User $user, public ModelHasRole $item)
    {
    }
}