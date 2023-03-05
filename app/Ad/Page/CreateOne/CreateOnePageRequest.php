<?php

declare(strict_types=1);

namespace App\Ad\Page\CreateOne;

use App\AbstractBase\AbstractRequest;

class CreateOnePageRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'title' => [
                'required',
                'string',
                'max:111',
            ],

            'content' => [
                'required',
                'string',
            ],


        ];
    }
}