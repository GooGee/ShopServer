<?php

declare(strict_types=1);

namespace App\Ad\Page\DeleteOne;


use App\Models\Page;
use Illuminate\Foundation\Auth\User;

class DeleteOnePageEvent
{
    public function __construct(public User $user, public Page $item)
    {
    }
}