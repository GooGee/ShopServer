<?php

declare(strict_types=1);

namespace App\Ad\Address\CreateOne;

use App\AbstractBase\AbstractRequest;

class CreateOneAddressRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'countryId' => [
                'exists:Country,id',
                'required',
                'integer',
                'min:1',
            ],

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