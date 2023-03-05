<?php

declare(strict_types=1);

namespace App\Ad\Category\ReadMany;

use App\AbstractBase\AbstractRequest;

class ReadManyCategoryRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'parentId' => [
                'integer',
                'min:1',
                'required',
            ],


        ];
    }
}