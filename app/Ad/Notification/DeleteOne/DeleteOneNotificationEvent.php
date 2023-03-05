<?php

declare(strict_types=1);

namespace App\Ad\Notification\DeleteOne;


use App\Models\Notification;
use Illuminate\Foundation\Auth\User;

class DeleteOneNotificationEvent
{
    public function __construct(public User $user, public Notification $item)
    {
    }
}