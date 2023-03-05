<?php

declare(strict_types=1);

namespace App\Api\Order\CreateOne;

use App\AbstractBase\AbstractRequest;

class CreateOneOrderRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'addressId' => [
                'required',
                'exists:Address,id',
                'integer',
                'min:1',
            ],


        ];
    }
}