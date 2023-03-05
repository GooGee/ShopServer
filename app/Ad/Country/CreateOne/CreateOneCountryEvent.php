<?php

declare(strict_types=1);

namespace App\Ad\Country\CreateOne;


use App\Models\Country;
use Illuminate\Foundation\Auth\User;

class CreateOneCountryEvent
{
    public function __construct(public User $user, public Country $item)
    {
    }
}