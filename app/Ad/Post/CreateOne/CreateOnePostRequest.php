<?php

declare(strict_types=1);

namespace App\Ad\Post\CreateOne;

use App\AbstractBase\AbstractRequest;

class CreateOnePostRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'reviewId' => [
                'required',
                'exists:Review,id',
                'integer',
                'min:1',
            ],

            'text' => [
                'required',
                'string',
                'max:1222',
            ],


        ];
    }
}