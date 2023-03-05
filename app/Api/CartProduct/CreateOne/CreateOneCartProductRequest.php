<?php

declare(strict_types=1);

namespace App\Api\CartProduct\CreateOne;

use App\AbstractBase\AbstractRequest;

class CreateOneCartProductRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'productSkuId' => [
                'required',
                'exists:ProductSku,id',
                'integer',
                'min:1',
            ],

            'amount' => [
                'required',
                'integer',
                'min:1',
            ],


        ];
    }
}