<?php

declare(strict_types=1);

namespace App\Ad\Voucher\UpdateOne;

use App\Models\Admin;

use App\Models\Voucher;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateOneVoucher
{
    public function __construct()
    {
    }

    function run(int $id, Admin $user,

                      string $type,
                      int $amount,
                      int $limit,
                      string $code,
                      ?string $dtStart,
                      ?string $dtEnd,
                      string $name,)
    {
        $item = Voucher::findOrFail($id);

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }


        $item->type = $type;
        $item->amount = $amount;
        $item->limit = $limit;
        $item->code = $code;
        $item->dtStart = $dtStart;
        $item->dtEnd = $dtEnd;
        $item->name = $name;

        $item->save();

        event(new UpdateOneVoucherEvent($user, $item));

        return $item;
    }

}