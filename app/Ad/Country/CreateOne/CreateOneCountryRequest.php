<?php

declare(strict_types=1);

namespace App\Ad\Country\CreateOne;

use App\AbstractBase\AbstractRequest;

class CreateOneCountryRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'name' => [
                'required',
                'string',
                'max:33',
                'unique:Country',
            ],


        ];
    }
}