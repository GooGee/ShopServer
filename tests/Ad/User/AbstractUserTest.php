<?php

declare(strict_types=1);

namespace Tests\Ad\User;

use App\Models\User;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractUserTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "User";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return User
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = User::factory()
            ->makeOne($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return User::keyzz();
    }

}