<?php

declare(strict_types=1);

namespace App\Ad\Notification\UpdateOne;


use App\Models\Notification;
use Illuminate\Foundation\Auth\User;

class UpdateOneNotificationEvent
{
    public function __construct(public User $user, public Notification $item)
    {
    }
}