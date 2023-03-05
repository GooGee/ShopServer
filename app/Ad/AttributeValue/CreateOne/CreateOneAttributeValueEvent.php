<?php

declare(strict_types=1);

namespace App\Ad\AttributeValue\CreateOne;


use App\Models\AttributeValue;
use Illuminate\Foundation\Auth\User;

class CreateOneAttributeValueEvent
{
    public function __construct(public User $user, public AttributeValue $item)
    {
    }
}