<?php

declare(strict_types=1);

namespace Tests\Api\OrderProduct;


use App\Models\OrderProduct;
use Illuminate\Foundation\Auth\User;
use Tests\API\AbstractApiTest;

abstract class AbstractOrderProductTest extends AbstractApiTest
{

    protected function path(): string
    {
        return "OrderProduct";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return OrderProduct
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = OrderProduct::factory()
            ->makeOne($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return OrderProduct::keyzz();
    }

}