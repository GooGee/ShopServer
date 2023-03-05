<?php

declare(strict_types=1);

namespace App\Ad\Role\UpdateOne;

use App\AbstractBase\AbstractRequest;

class UpdateOneRoleRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'name' => [
                'required',
                'string',
                'max:111',
            ],


        ];
    }
}