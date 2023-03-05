<?php

declare(strict_types=1);

namespace Tests\Api\CartProduct;


use App\Models\CartProduct;
use Illuminate\Foundation\Auth\User;
use Tests\API\AbstractApiTest;

abstract class AbstractCartProductTest extends AbstractApiTest
{

    protected function path(): string
    {
        return "CartProduct";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return CartProduct
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = CartProduct::factory()
            ->for($user)
            ->makeOne($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return CartProduct::keyzz();
    }

}