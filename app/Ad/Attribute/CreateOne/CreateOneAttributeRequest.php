<?php

declare(strict_types=1);

namespace App\Ad\Attribute\CreateOne;

use App\AbstractBase\AbstractRequest;

class CreateOneAttributeRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'categoryId' => [
                'required',
                'exists:Category,id',
                'integer',
                'min:1',
            ],

            'name' => [
                'required',
                'string',
                'max:111',
            ],


        ];
    }
}