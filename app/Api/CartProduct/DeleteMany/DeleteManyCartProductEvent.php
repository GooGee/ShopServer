<?php

declare(strict_types=1);

namespace App\Api\CartProduct\DeleteMany;


use Illuminate\Foundation\Auth\User;

class DeleteManyCartProductEvent
{
    /**
     * @param User $user
     * @param array<int> $idzz
     */
    public function __construct(public User $user, public array $idzz)
    {
    }
}