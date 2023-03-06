<?php

declare(strict_types=1);

namespace App\Ad\Voucher\ReadMany;


use App\Models\Voucher;

class ReadManyVoucher
{
    public function __construct()
    {
    }

    /**
     * @param array<int> $idzz
     * @return \Illuminate\Database\Eloquent\Collection<int, Voucher>
     */
    function run(array $idzz)
    {
        return Voucher::query()
            ->whereIn('id', $idzz)
            ->whereNull('dtDelete')
            ->get();
    }

}