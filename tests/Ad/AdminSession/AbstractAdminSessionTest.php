<?php

declare(strict_types=1);

namespace Tests\Ad\AdminSession;

use Illuminate\Foundation\Auth\User;

use App\Models\AdminSession;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractAdminSessionTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "AdminSession";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return AdminSession
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = AdminSession::factory()
            ->make($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return AdminSession::keyzz();
    }

}