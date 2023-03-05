<?php

declare(strict_types=1);

namespace Tests\Api\User;


use App\Models\User;
use Tests\API\AbstractApiTest;

abstract class AbstractUserTest extends AbstractApiTest
{

    protected function path(): string
    {
        return "User";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return User
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = User::factory()
            ->make($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        $keyzz = User::keyzz();
        return collect($keyzz)->filter(function ($item) {
            return $item !== 'email';
        })->all();
    }

}