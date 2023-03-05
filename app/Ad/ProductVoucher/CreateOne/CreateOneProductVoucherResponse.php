<?php

declare(strict_types=1);

namespace App\Ad\ProductVoucher\CreateOne;

use App\AbstractBase\AbstractResponse;

use App\Models\ProductVoucher;

class CreateOneProductVoucherResponse extends AbstractResponse
{
    /**
     * @param ProductVoucher $item
     * @return array
     */
    static function getData($item): array
    {
        return [

            'id' => $item->id,

            'dtCreate' => $item->dtCreate,

            'dtUpdate' => $item->dtUpdate,

            'dtDelete' => $item->dtDelete,

            'productId' => $item->productId,

            'voucherId' => $item->voucherId,

        ];
    }
}