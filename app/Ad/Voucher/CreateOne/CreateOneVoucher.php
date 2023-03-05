<?php

declare(strict_types=1);

namespace App\Ad\Voucher\CreateOne;

use App\Models\Admin;

use App\Models\Voucher;

class CreateOneVoucher
{
    public function __construct()
    {
    }

    function run(Admin $user,

                      string $type,
                      int $amount,
                      int $limit,
                      string $code,
                      ?string $dtStart,
                      ?string $dtEnd,
                      string $name,
    )
    {
        $item = new Voucher();

        $item->type = $type;
        $item->amount = $amount;
        $item->limit = $limit;
        $item->code = $code;
        $item->dtStart = $dtStart;
        $item->dtEnd = $dtEnd;
        $item->name = $name;

        $item->save();
        $item->refresh();

        event(new CreateOneVoucherEvent($user, $item));

        return $item;
    }

}