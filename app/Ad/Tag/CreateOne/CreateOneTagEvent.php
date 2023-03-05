<?php

declare(strict_types=1);

namespace App\Ad\Tag\CreateOne;


use App\Models\Tag;
use Illuminate\Foundation\Auth\User;

class CreateOneTagEvent
{
    public function __construct(public User $user, public Tag $item)
    {
    }
}