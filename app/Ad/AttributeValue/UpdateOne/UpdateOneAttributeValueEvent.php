<?php

declare(strict_types=1);

namespace App\Ad\AttributeValue\UpdateOne;


use App\Models\AttributeValue;
use Illuminate\Foundation\Auth\User;

class UpdateOneAttributeValueEvent
{
    public function __construct(public User $user, public AttributeValue $item)
    {
    }
}