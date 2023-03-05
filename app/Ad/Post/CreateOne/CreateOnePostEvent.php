<?php

declare(strict_types=1);

namespace App\Ad\Post\CreateOne;


use App\Models\Post;
use Illuminate\Foundation\Auth\User;

class CreateOnePostEvent
{
    public function __construct(public User $user, public Post $item)
    {
    }
}