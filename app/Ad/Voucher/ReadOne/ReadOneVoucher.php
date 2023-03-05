<?php

declare(strict_types=1);

namespace App\Ad\Voucher\ReadOne;


use App\Models\Voucher;

class ReadOneVoucher
{
    public function __construct()
    {
    }

    function find(int $id)
    {
        return Voucher::find($id);
    }

    function findOrFail(int $id)
    {
        return Voucher::findOrFail($id);
    }

}