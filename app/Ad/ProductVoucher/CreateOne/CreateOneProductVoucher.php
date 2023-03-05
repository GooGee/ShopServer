<?php

declare(strict_types=1);

namespace App\Ad\ProductVoucher\CreateOne;

use App\Models\Admin;

use App\Models\ProductVoucher;

class CreateOneProductVoucher
{
    public function __construct()
    {
    }

    function run(Admin $user,

                      int $productId,
                      int $voucherId,
    )
    {
        $item = new ProductVoucher();

        $item->productId = $productId;
        $item->voucherId = $voucherId;

        $item->save();
        $item->refresh();

        event(new CreateOneProductVoucherEvent($user, $item));

        return $item;
    }

}