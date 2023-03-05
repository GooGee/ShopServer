<?php

declare(strict_types=1);

namespace App\Ad\Attribute\UpdateOne;

use App\AbstractBase\AbstractRequest;

class UpdateOneAttributeRequest extends AbstractRequest
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