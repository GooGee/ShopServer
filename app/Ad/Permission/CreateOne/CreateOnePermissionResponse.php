<?php

declare(strict_types=1);

namespace App\Ad\Permission\CreateOne;

use App\AbstractBase\AbstractResponse;

use App\Models\Permission;

class CreateOnePermissionResponse extends AbstractResponse
{
    /**
     * @param Permission $item
     * @return array
     */
    static function getData($item): array
    {
        return [

            'id' => $item->id,

            'name' => $item->name,

            'guard_name' => $item->guard_name,

            'dtCreate' => $item->dtCreate,

            'dtUpdate' => $item->dtUpdate,

            'dtDelete' => $item->dtDelete,

            'moderator' => $item->moderator,

        ];
    }
}