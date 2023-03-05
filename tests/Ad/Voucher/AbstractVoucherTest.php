<?php

declare(strict_types=1);

namespace Tests\Ad\Voucher;

use Illuminate\Foundation\Auth\User;

use App\Models\Voucher;
use Tests\Ad\AbstractAdminTest;

abstract class AbstractVoucherTest extends AbstractAdminTest
{

    protected function path(): string
    {
        return "Voucher";
    }

    /**
     * @param User $user
     * @param array<string, mixed> $attributes
     * @return Voucher
     */
    static function makeItem(User $user, array $attributes = [])
    {
        $item = Voucher::factory()
            ->makeOne($attributes);
        return $item;
    }

    /**
     * @return string[]
     */
    static function structure(): array
    {
        return Voucher::keyzz();
    }

}