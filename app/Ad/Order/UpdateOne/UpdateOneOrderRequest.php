<?php

declare(strict_types=1);

namespace App\Ad\Order\UpdateOne;

use App\AbstractBase\AbstractRequest;

class UpdateOneOrderRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'dtCancel' => [
                'required',
                'sometimes',
                'string',
            ],

            'dtFulfill' => [
                'required',
                'sometimes',
                'string',
            ],

            'dtRefund' => [
                'required',
                'sometimes',
                'string',
            ],


        ];
    }
}