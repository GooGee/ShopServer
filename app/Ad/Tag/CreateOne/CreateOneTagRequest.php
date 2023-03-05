<?php

declare(strict_types=1);

namespace App\Ad\Tag\CreateOne;

use App\AbstractBase\AbstractRequest;

class CreateOneTagRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'name' => [
                'unique:Tag',
                'required',
                'string',
                'max:33',
            ],


        ];
    }
}