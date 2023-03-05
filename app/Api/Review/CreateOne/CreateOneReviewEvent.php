<?php

declare(strict_types=1);

namespace App\Api\Review\CreateOne;


use App\Models\Review;
use Illuminate\Foundation\Auth\User;

class CreateOneReviewEvent
{
    public function __construct(public User $user, public Review $item)
    {
    }
}