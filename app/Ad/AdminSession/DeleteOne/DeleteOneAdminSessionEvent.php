<?php

declare(strict_types=1);

namespace App\Ad\AdminSession\DeleteOne;


use App\Models\AdminSession;
use Illuminate\Foundation\Auth\User;

class DeleteOneAdminSessionEvent
{
    public function __construct(public User $user, public AdminSession $item)
    {
    }
}