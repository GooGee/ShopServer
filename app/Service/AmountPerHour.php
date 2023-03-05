<?php

declare(strict_types=1);

namespace App\Service;

class AmountPerHour
{
    const Base = 10;
    const Minute = 60;
    const Pivot = 1000;

    /**
     * e.g.
     * randomly create $amount user per hour
     *
     * @param int $amount
     * @return bool
     */
    static function with(int $amount)
    {
        if ($amount < 1) {
            return false;
        }
        if ($amount >= self::Minute) {
            return true;
        }

        $max = intval(floor(self::Minute * self::Pivot / $amount));
        $result = rand(0, $max - 1);
        return $result < self::Pivot;
    }

    /**
     * e.g.
     * create 10 user per hour when total is less than 100
     * create 11 user per hour when total is less than 400
     * create 12 user per hour when total is less than 900
     *
     * @param int $total
     * @return bool
     */
    static function after(int $total)
    {
        if ($total < 0) {
            $total = 0;
        }
        $value = floor(sqrt($total / 100));
        return self::with(self::Base + intval($value));
    }
}