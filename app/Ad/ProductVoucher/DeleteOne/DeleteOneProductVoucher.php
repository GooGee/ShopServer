<?php

declare(strict_types=1);

namespace App\Ad\ProductVoucher\DeleteOne;

use App\Models\Admin;

use App\Models\ProductVoucher;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteOneProductVoucher
{
    public function __construct()
    {
    }

    function run(Admin $user, int $id)
    {
        $item = ProductVoucher::findOrFail($id);

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }

        $item->delete();

        event(new DeleteOneProductVoucherEvent($user, $item));

        return $item;
    }
}