<?php

declare(strict_types=1);

namespace App\Ad\Admin\CreateOne;


use App\Models\Admin;
use Illuminate\Foundation\Auth\User;

class CreateOneAdminEvent
{
    public function __construct(public User $user, public Admin $item)
    {
    }
}