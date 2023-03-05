<?php

declare(strict_types=1);

namespace Tests\Ad\Address;

use Illuminate\Foundation\Auth\User;

use App\Models\Address;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractAddressTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "Address";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return Address
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = Address::factory()
            ->makeOne($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return Address::keyzz();
    }

}