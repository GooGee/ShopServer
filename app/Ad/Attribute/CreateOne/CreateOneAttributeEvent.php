<?php

declare(strict_types=1);

namespace App\Ad\Attribute\CreateOne;


use App\Models\Attribute;
use Illuminate\Foundation\Auth\User;

class CreateOneAttributeEvent
{
    public function __construct(public User $user, public Attribute $item)
    {
    }
}