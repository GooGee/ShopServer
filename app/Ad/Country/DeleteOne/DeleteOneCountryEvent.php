<?php

declare(strict_types=1);

namespace App\Ad\Country\DeleteOne;


use App\Models\Country;
use Illuminate\Foundation\Auth\User;

class DeleteOneCountryEvent
{
    public function __construct(public User $user, public Country $item)
    {
    }
}