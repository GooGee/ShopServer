<?php

declare(strict_types=1);

namespace App\Ad\Role\CreateOne;

use App\AbstractBase\AbstractResponse;

use App\Models\Role;

class CreateOneRoleResponse extends AbstractResponse
{
    /**
     * @param Role $item
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

            'isUserCreated' => $item->isUserCreated,

        ];
    }
}