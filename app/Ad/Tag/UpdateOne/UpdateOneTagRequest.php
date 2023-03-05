<?php

declare(strict_types=1);

namespace App\Ad\Tag\UpdateOne;

use App\AbstractBase\AbstractRequest;

class UpdateOneTagRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'name' => [
                'required',
                'string',
                'max:33',
            ],


        ];
    }
}