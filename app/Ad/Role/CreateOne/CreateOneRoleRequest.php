<?php

declare(strict_types=1);

namespace App\Ad\Role\CreateOne;

use App\AbstractBase\AbstractRequest;

class CreateOneRoleRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'name' => [
                'required',
                'string',
                'max:111',
                'unique:roles',
            ],


        ];
    }
}