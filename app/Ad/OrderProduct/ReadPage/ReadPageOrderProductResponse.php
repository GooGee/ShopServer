<?php

declare(strict_types=1);

namespace App\Ad\OrderProduct\ReadPage;

use App\AbstractBase\AbstractResponse;

use App\Models\OrderProduct;

class ReadPageOrderProductResponse extends AbstractResponse
{
    /**
     * @param OrderProduct $item
     * @return array
     */
    static function getData($item): array
    {
        return [

            'id' => $item->id,

            'dtCreate' => $item->dtCreate,

            'dtUpdate' => $item->dtUpdate,

            'dtDelete' => $item->dtDelete,

            'amount' => $item->amount,

            'orderId' => $item->orderId,

            'price' => $item->price,

            'productSkuId' => $item->productSkuId,

            'productSku' => $item->productSku,

        ];
    }
}