<?php

declare(strict_types=1);

namespace App\Api\OrderProduct\ReadMany;

use App\AbstractBase\AbstractRequest;

class ReadManyOrderProductRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'orderId' => [
                'required',
                'integer',
                'min:1',
            ],


        ];
    }
}