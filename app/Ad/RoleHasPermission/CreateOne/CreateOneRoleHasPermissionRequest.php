<?php

declare(strict_types=1);

namespace App\Ad\RoleHasPermission\CreateOne;

use App\AbstractBase\AbstractRequest;

class CreateOneRoleHasPermissionRequest extends AbstractRequest
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

            'role_id' => [
                'required',
                'exists:roles,id',
                'integer',
                'min:1',
            ],


        ];
    }
}