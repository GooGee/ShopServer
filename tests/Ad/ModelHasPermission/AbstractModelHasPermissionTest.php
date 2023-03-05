<?php

declare(strict_types=1);

namespace Tests\Ad\ModelHasPermission;

use Illuminate\Foundation\Auth\User;

use App\Models\ModelHasPermission;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractModelHasPermissionTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "ModelHasPermission";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return ModelHasPermission
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = ModelHasPermission::factory()
            ->makeOne($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return ModelHasPermission::keyzz();
    }

}