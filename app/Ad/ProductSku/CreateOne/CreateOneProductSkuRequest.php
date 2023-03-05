<?php

declare(strict_types=1);

namespace App\Ad\ProductSku\CreateOne;

use App\AbstractBase\AbstractRequest;

class CreateOneProductSkuRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'productId' => [
                'required',
                'exists:Product,id',
                'integer',
                'min:1',
            ],

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

            'variationzz' => [
                'max:11',
                'array',
                'present',
            ],


        ];
    }
}