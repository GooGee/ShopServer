<?php

declare(strict_types=1);

namespace App\Ad\Page\UpdateOne;


use App\Models\Page;
use Illuminate\Foundation\Auth\User;

class UpdateOnePageEvent
{
    public function __construct(public User $user, public Page $item)
    {
    }
}