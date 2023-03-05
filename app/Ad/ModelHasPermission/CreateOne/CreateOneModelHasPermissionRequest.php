<?php

declare(strict_types=1);

namespace App\Ad\ModelHasPermission\CreateOne;

use App\AbstractBase\AbstractRequest;

class CreateOneModelHasPermissionRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'permission_id' => [
                'required',
                'exists:permissions,id',
                'integer',
                'min:1',
            ],

            'model_id' => [
                'required',
                'integer',
                'min:1',
            ],


        ];
    }
}