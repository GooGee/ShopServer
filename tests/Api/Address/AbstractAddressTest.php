<?php

declare(strict_types=1);

namespace Tests\Api\Address;


use App\Models\Address;
use Illuminate\Foundation\Auth\User;
use Tests\API\AbstractApiTest;

abstract class AbstractAddressTest extends AbstractApiTest
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
            ->for($user)
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