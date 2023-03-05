<?php

declare(strict_types=1);

namespace App\Api\Address\UpdateOne;

use App\AbstractBase\AbstractRequest;

class UpdateOneAddressRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'zip' => [
                'required',
                'integer',
                'min:111',
            ],

            'name' => [
                'required',
                'string',
                'max:111',
            ],

            'phone' => [
                'required',
                'string',
                'max:33',
            ],

            'text' => [
                'required',
                'string',
                'max:111',
            ],


        ];
    }
}