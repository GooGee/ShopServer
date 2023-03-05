<?php

declare(strict_types=1);

namespace Tests\Ad\Role;

use Illuminate\Foundation\Auth\User;

use App\Models\Role;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractRoleTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "Role";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return Role
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = Role::factory()
            ->makeOne($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return Role::keyzz();
    }

}