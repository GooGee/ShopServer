<?php

declare(strict_types=1);

namespace App\Ad\Attribute\DeleteOne;


use App\Models\Attribute;
use Illuminate\Foundation\Auth\User;

class DeleteOneAttributeEvent
{
    public function __construct(public User $user, public Attribute $item)
    {
    }
}