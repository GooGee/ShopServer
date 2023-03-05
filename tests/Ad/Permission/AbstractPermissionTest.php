<?php

declare(strict_types=1);

namespace Tests\Ad\Permission;

use Illuminate\Foundation\Auth\User;

use App\Models\Permission;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractPermissionTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "Permission";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return Permission
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = Permission::factory()
            ->makeOne($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return Permission::keyzz();
    }

}