<?php

declare(strict_types=1);

namespace App\Ad\AttributeValue\UpdateOne;

use App\AbstractBase\AbstractRequest;

class UpdateOneAttributeValueRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'attributeId' => [
                'required',
                'exists:Attribute,id',
                'integer',
                'min:1',
            ],

            'text' => [
                'required',
                'string',
                'max:111',
            ],


        ];
    }
}