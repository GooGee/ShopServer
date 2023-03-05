<?php

declare(strict_types=1);

namespace App\Ad\Category\DeleteOne;


use App\Models\Category;
use Illuminate\Foundation\Auth\User;

class DeleteOneCategoryEvent
{
    public function __construct(public User $user, public Category $item)
    {
    }
}