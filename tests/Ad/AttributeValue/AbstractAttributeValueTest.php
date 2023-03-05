<?php

declare(strict_types=1);

namespace Tests\Ad\AttributeValue;

use Illuminate\Foundation\Auth\User;

use App\Models\AttributeValue;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractAttributeValueTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "AttributeValue";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return AttributeValue
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = AttributeValue::factory()
            ->makeOne($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return AttributeValue::keyzz();
    }

}