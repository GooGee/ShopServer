<?php

declare(strict_types=1);

namespace App\Ad\Attribute\ReadPage;

use App\AbstractBase\ReadPageRequest;

class ReadPageAttributeRequest extends ReadPageRequest
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

            'name' => [
                'required',
                'string',
                'max:111',
                'sometimes',
            ],

            'categoryId' => [
                'required',
                'exists:Category,id',
                'integer',
                'min:1',
                'sometimes',
            ],


        ];
    }
}