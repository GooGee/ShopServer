<?php

declare(strict_types=1);

namespace App\Ad\Tag\UpdateOne;


use App\Models\Tag;
use Illuminate\Foundation\Auth\User;

class UpdateOneTagEvent
{
    public function __construct(public User $user, public Tag $item)
    {
    }
}