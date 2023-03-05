<?php

declare(strict_types=1);

namespace App\Ad\FileInfo\CreateOne;

use App\AbstractBase\AbstractRequest;

class CreateOneFileInfoRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'uri' => [
                'required',
                'string',
                'max:333',
                'url',
            ],


        ];
    }
}