<?php

declare(strict_types=1);

namespace App\Ad\Category\ReadPage;

use App\AbstractBase\ReadPageRequest;

class ReadPageCategoryRequest extends ReadPageRequest
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
                'max:33',
                'sometimes',
            ],

            'parentId' => [
                'integer',
                'min:1',
                'required',
                'sometimes',
            ],


        ];
    }
}