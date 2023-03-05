<?php

declare(strict_types=1);

namespace App\Ad\Category\CreateOne;

use App\AbstractBase\AbstractRequest;

class CreateOneCategoryRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'name' => [
                'required',
                'string',
                'max:33',
            ],

            'parentId' => [
                'integer',
                'min:1',
                'required',
            ],

            'image' => [
                'required',
                'string',
                'max:111',
            ],


        ];
    }
}