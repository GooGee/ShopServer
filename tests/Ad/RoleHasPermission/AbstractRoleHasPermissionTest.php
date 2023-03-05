<?php

declare(strict_types=1);

namespace Tests\Ad\RoleHasPermission;

use Illuminate\Foundation\Auth\User;

use App\Models\RoleHasPermission;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractRoleHasPermissionTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "RoleHasPermission";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return RoleHasPermission
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = RoleHasPermission::factory()
            ->makeOne($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return RoleHasPermission::keyzz();
    }

}