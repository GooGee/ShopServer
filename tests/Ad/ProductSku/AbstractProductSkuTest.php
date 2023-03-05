<?php

declare(strict_types=1);

namespace Tests\Ad\ProductSku;

use Illuminate\Foundation\Auth\User;

use App\Models\ProductSku;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractProductSkuTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "ProductSku";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return ProductSku
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = ProductSku::factory()
            ->make($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return ProductSku::keyzz();
    }

}