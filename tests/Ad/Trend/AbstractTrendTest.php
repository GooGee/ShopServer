<?php

declare(strict_types=1);

namespace Tests\Ad\Trend;

use Illuminate\Foundation\Auth\User;

use App\Models\Trend;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractTrendTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "Trend";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return Trend
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = Trend::factory()
            ->makeOne($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return Trend::keyzz();
    }

}