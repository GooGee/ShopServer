<?php

declare(strict_types=1);

namespace Tests\Ad\ModelHasRole;

use Illuminate\Foundation\Auth\User;

use App\Models\ModelHasRole;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractModelHasRoleTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "ModelHasRole";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return ModelHasRole
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = ModelHasRole::factory()
            ->makeOne($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return ModelHasRole::keyzz();
    }

}