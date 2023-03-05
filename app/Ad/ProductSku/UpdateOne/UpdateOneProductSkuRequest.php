<?php

declare(strict_types=1);

namespace App\Ad\ProductSku\UpdateOne;

use App\AbstractBase\AbstractRequest;

class UpdateOneProductSkuRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'price' => [
                'required',
                'integer',
                'min:1000',
            ],

            'stock' => [
                'required',
                'integer',
                'min:0',
            ],


        ];
    }
}