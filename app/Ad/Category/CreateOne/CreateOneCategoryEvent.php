<?php

declare(strict_types=1);

namespace App\Ad\Category\CreateOne;


use App\Models\Category;
use Illuminate\Foundation\Auth\User;

class CreateOneCategoryEvent
{
    public function __construct(public User $user, public Category $item)
    {
    }
}