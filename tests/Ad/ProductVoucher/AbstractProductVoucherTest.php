<?php

declare(strict_types=1);

namespace Tests\Ad\ProductVoucher;

use Illuminate\Foundation\Auth\User;

use App\Models\ProductVoucher;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractProductVoucherTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "ProductVoucher";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return ProductVoucher
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = ProductVoucher::factory()
            ->makeOne($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return ProductVoucher::keyzz();
    }

}