<?php

declare(strict_types=1);

namespace Tests\Ad\Order;

use Illuminate\Foundation\Auth\User;

use App\Models\Order;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractOrderTest extends AbstractAdminTest
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