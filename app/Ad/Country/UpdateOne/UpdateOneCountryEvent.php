<?php

declare(strict_types=1);

namespace App\Ad\Country\UpdateOne;


use App\Models\Country;
use Illuminate\Foundation\Auth\User;

class UpdateOneCountryEvent
{
    public function __construct(public User $user, public Country $item)
    {
    }
}