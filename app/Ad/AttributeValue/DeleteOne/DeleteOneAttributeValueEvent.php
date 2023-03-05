<?php

declare(strict_types=1);

namespace App\Ad\AttributeValue\DeleteOne;


use App\Models\AttributeValue;
use Illuminate\Foundation\Auth\User;

class DeleteOneAttributeValueEvent
{
    public function __construct(public User $user, public AttributeValue $item)
    {
    }
}