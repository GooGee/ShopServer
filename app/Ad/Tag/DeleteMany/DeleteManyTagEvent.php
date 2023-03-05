<?php

declare(strict_types=1);

namespace App\Ad\Tag\DeleteMany;


use Illuminate\Foundation\Auth\User;

class DeleteManyTagEvent
{
    /**
     * @param User $user
     * @param array<int> $idzz
     */
    public function __construct(public User $user, public array $idzz)
    {
    }
}