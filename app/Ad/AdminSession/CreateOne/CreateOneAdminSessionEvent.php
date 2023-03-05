<?php

declare(strict_types=1);

namespace App\Ad\AdminSession\CreateOne;


use App\Models\AdminSession;
use Illuminate\Foundation\Auth\User;

class CreateOneAdminSessionEvent
{
    public function __construct(public User $user, public AdminSession $item)
    {
    }
}