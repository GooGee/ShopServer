<?php

declare(strict_types=1);

namespace App\Ad\Trend\CreateOne;


use App\Models\Trend;
use Illuminate\Foundation\Auth\User;

class CreateOneTrendEvent
{
    public function __construct(public User $user, public Trend $item)
    {
    }
}