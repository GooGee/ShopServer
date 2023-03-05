<?php

declare(strict_types=1);

namespace Tests\Ad\Attribute;

use Illuminate\Foundation\Auth\User;

use App\Models\Attribute;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractAttributeTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "Attribute";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return Attribute
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = Attribute::factory()
            ->makeOne($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return Attribute::keyzz();
    }

}