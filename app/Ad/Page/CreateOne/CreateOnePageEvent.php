<?php

declare(strict_types=1);

namespace App\Ad\Page\CreateOne;


use App\Models\Page;
use Illuminate\Foundation\Auth\User;

class CreateOnePageEvent
{
    public function __construct(public User $user, public Page $item)
    {
    }
}