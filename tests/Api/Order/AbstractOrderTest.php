<?php

declare(strict_types=1);

namespace Tests\Api\Order;


use App\Models\Order;
use Illuminate\Foundation\Auth\User;
use Tests\API\AbstractApiTest;

abstract class AbstractOrderTest extends AbstractApiTest
{

    protected function path(): string
    {
        return "Order";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return Order
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = Order::factory()
            ->for($user)
            ->makeOne($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return Order::keyzz();
    }

}