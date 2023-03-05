<?php

declare(strict_types=1);

namespace App\Ad\Operation\CreateOne;

use App\AbstractBase\AbstractRequest;

class CreateOneOperationRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'name' => [
                'required',
                'string',
                'max:111',
            ],

            'text' => [
                'required',
                'string',
                'max:111',
            ],


        ];
    }
}