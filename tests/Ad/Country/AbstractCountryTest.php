<?php

declare(strict_types=1);

namespace Tests\Ad\Country;

use Illuminate\Foundation\Auth\User;

use App\Models\Country;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractCountryTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "Country";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return Country
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = Country::factory()
            ->makeOne($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return Country::keyzz();
    }

}