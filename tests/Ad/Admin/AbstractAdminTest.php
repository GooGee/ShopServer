<?php

declare(strict_types=1);

namespace Tests\Ad\Admin;

use Illuminate\Foundation\Auth\User;

use App\Models\Admin;
use Tests\Ad\AbstractAdminTest as AbstractTest;

abstract class AbstractAdminTest extends AbstractTest
{

    protected function path(): string
    {
        return "Admin";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return Admin
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = Admin::factory()
            ->make($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return Admin::keyzz();
    }

}