<?php

declare(strict_types=1);

namespace App\Ad\Notification\CreateOne;


use App\Models\Notification;
use Illuminate\Foundation\Auth\User;

class CreateOneNotificationEvent
{
    public function __construct(public User $user, public Notification $item)
    {
    }
}