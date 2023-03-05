<?php

declare(strict_types=1);

namespace App\Service;

class PriceService
{
    const Base3 = 1e3;
    const Base5 = 1e5;

    static function calculate(int $price, int $discount): int
    {
        $value = $price * (100 - $discount) / 100 / self::Base3;
        return intval(ceil($value) * self::Base3);
    }
}