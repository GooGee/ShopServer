<?php

declare(strict_types=1);

namespace App\Ad\AttributeValue\ReadPage;

use App\AbstractBase\ReadPageRequest;

class ReadPageAttributeValueRequest extends ReadPageRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return static::getRulezzForPage();
    }

    static function getRulezz()
    {
        return [

            'attributeId' => [
                'required',
                'exists:Attribute,id',
                'integer',
                'min:1',
                'sometimes',
            ],

            'text' => [
                'required',
                'string',
                'max:111',
                'sometimes',
            ],


        ];
    }
}