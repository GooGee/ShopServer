<?php

declare(strict_types=1);

namespace App\Ad\Admin\UpdateOne;


use App\Models\Admin;
use Illuminate\Foundation\Auth\User;

class UpdateOneAdminEvent
{
    public function __construct(public User $user, public Admin $item)
    {
    }
}