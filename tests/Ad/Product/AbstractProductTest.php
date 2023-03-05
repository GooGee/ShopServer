<?php

declare(strict_types=1);

namespace Tests\Ad\Product;

use Illuminate\Foundation\Auth\User;

use App\Models\Product;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractProductTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "Product";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return Product
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = Product::factory()
            ->make($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return Product::keyzz();
    }

}