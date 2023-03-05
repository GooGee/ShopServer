<?php

declare(strict_types=1);

namespace App\Ad\Category\UpdateOne;


use App\Models\Category;
use Illuminate\Foundation\Auth\User;

class UpdateOneCategoryEvent
{
    public function __construct(public User $user, public Category $item)
    {
    }
}