<?php

declare(strict_types=1);

namespace App\Ad\Tag\UpdateMany;


use Illuminate\Foundation\Auth\User;

class UpdateManyTagEvent
{
    /**
     * @param User $user
     * @param array<int> $idzz
     */
    public function __construct(public User $user, public array $idzz)
    {
    }
}