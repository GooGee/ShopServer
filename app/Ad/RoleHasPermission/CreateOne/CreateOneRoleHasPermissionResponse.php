<?php

declare(strict_types=1);

namespace App\Ad\RoleHasPermission\CreateOne;

use App\AbstractBase\AbstractResponse;

use App\Models\RoleHasPermission;

class CreateOneRoleHasPermissionResponse extends AbstractResponse
{
    /**
     * @param RoleHasPermission $item
     * @return array
     */
    static function getData($item): array
    {
        return [

            'permission_id' => $item->permission_id,

            'role_id' => $item->role_id,

            'id' => $item->id,

        ];
    }
}