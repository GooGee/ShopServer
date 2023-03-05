<?php

declare(strict_types=1);

namespace App\Ad\Setting\UpdateOne;


use App\Models\Setting;
use Illuminate\Foundation\Auth\User;

class UpdateOneSettingEvent
{
    public function __construct(public User $user, public Setting $item)
    {
    }
}