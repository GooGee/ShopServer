<?php

declare(strict_types=1);

namespace App\Api\CartProduct\CreateOne;

use App\AbstractBase\AbstractResponse;

use App\Models\CartProduct;

class CreateOneCartProductResponse extends AbstractResponse
{
    /**
     * @param CartProduct $item
     * @return array
     */
    static function getData($item): array
    {
        return [

            'id' => $item->id,

            'dtCreate' => $item->dtCreate,

            'dtUpdate' => $item->dtUpdate,

            'dtDelete' => $item->dtDelete,

            'userId' => $item->userId,

            'productSkuId' => $item->productSkuId,

            'amount' => $item->amount,

        ];
    }
}