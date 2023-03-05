<?php

declare(strict_types=1);

namespace Tests\Ad\Setting;

use Illuminate\Foundation\Auth\User;

use App\Models\Setting;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractSettingTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "Setting";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return Setting
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = Setting::factory()
            ->makeOne($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return Setting::keyzz();
    }

}