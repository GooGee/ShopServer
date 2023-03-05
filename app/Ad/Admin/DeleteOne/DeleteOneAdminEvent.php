<?php

declare(strict_types=1);

namespace App\Ad\Admin\DeleteOne;


use App\Models\Admin;
use Illuminate\Foundation\Auth\User;

class DeleteOneAdminEvent
{
    public function __construct(public User $user, public Admin $item)
    {
    }
}