<?php

declare(strict_types=1);

namespace App\Ad\Country\UpdateOne;

use App\AbstractBase\AbstractRequest;

class UpdateOneCountryRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'name' => [
                'required',
                'string',
                'max:33',
            ],


        ];
    }
}