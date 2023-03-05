<?php

declare(strict_types=1);

namespace App\Ad\Tag\DeleteOne;


use App\Models\Tag;
use Illuminate\Foundation\Auth\User;

class DeleteOneTagEvent
{
    public function __construct(public User $user, public Tag $item)
    {
    }
}