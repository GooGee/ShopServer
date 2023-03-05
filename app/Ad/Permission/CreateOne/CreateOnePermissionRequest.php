<?php

declare(strict_types=1);

namespace App\Ad\Permission\CreateOne;

use App\AbstractBase\AbstractRequest;

class CreateOnePermissionRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'name' => [
                'required',
                'string',
                'max:111',
                'unique:permissions',
            ],

            'moderator' => [
                'required',
                'string',
                'max:111',
            ],


        ];
    }
}