<?php

declare(strict_types=1);

namespace App\Ad\Category\UpdateOne;

use App\AbstractBase\AbstractRequest;

class UpdateOneCategoryRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'parentId' => [
                'integer',
                'min:1',
                'required',
            ],

            'name' => [
                'required',
                'string',
                'max:33',
            ],

            'image' => [
                'required',
                'string',
                'max:111',
            ],


        ];
    }
}