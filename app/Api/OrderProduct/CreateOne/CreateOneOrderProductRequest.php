<?php

declare(strict_types=1);

namespace App\Api\OrderProduct\CreateOne;

use App\AbstractBase\AbstractRequest;

class CreateOneOrderProductRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'orderId' => [
                'required',
                'integer',
                'min:1',
            ],

            'amount' => [
            ],

            'price' => [
            ],

            'productSkuId' => [
            ],


        ];
    }
}