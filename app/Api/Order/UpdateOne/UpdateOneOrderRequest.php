<?php

declare(strict_types=1);

namespace App\Api\Order\UpdateOne;

use App\AbstractBase\AbstractRequest;

class UpdateOneOrderRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'dtCancel' => [
                'required',
                'sometimes',
            ],

            'dtReceive' => [
                'required',
                'sometimes',
            ],

            'dtReturn' => [
                'required',
                'sometimes',
            ],


        ];
    }
}