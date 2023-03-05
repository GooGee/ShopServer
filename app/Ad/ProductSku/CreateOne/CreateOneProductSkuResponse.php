<?php

declare(strict_types=1);

namespace App\Ad\ProductSku\CreateOne;

use App\AbstractBase\AbstractResponse;

use App\Models\ProductSku;

class CreateOneProductSkuResponse extends AbstractResponse
{
    /**
     * @param ProductSku $item
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

            'price' => $item->price,

            'stock' => $item->stock,

            'variationzz' => $item->variationzz,

        ];
    }
}