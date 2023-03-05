<?php

declare(strict_types=1);

namespace App\Ad\ModelHasRole\CreateOne;

use App\AbstractBase\AbstractRequest;

class CreateOneModelHasRoleRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'role_id' => [
                'required',
                'exists:roles,id',
                'integer',
                'min:0',
            ],

            'model_id' => [
                'required',
                'integer',
                'min:0',
            ],


        ];
    }
}