<?php

declare(strict_types=1);

namespace App\Ad\Attribute\UpdateOne;


use App\Models\Attribute;
use Illuminate\Foundation\Auth\User;

class UpdateOneAttributeEvent
{
    public function __construct(public User $user, public Attribute $item)
    {
    }
}