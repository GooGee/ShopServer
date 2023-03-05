<?php

declare(strict_types=1);

namespace Tests\Ad\Chart;

use Illuminate\Foundation\Auth\User;

use App\Models\Chart;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractChartTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "Chart";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return Chart
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = Chart::factory()
            ->makeOne($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return Chart::keyzz();
    }

}