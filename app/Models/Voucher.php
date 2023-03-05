<?php

declare(strict_types=1);

namespace App\Models;

/**
 * @method static self|null find(int $id)
 * @method static self findOrFail(int $id)
 */
class Voucher extends VoucherBase
{
    const PageSize = 20;

    const TypeAmount = 'Amount';
    const TypePercentage = 'Percentage';
    const TypeShipping = 'Shipping';

    const Typezz = [self::TypeAmount, self::TypePercentage, self::TypeShipping];
}