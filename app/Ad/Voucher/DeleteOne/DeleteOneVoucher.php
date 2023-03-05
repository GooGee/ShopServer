<?php

declare(strict_types=1);

namespace App\Ad\Voucher\DeleteOne;

use App\Models\Admin;

use App\Models\Voucher;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteOneVoucher
{
    public function __construct()
    {
    }

    function run(Admin $user, int $id)
    {
        $item = Voucher::findOrFail($id);

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }

        $item->delete();

        event(new DeleteOneVoucherEvent($user, $item));

        return $item;
    }
}