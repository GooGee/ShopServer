<?php

declare(strict_types=1);

namespace App\Ad\Admin\ReadOne;

use App\AbstractBase\AbstractResponse;

use App\Models\Admin;

class ReadOneAdminResponse extends AbstractResponse
{
    /**
     * @param Admin $item
     * @return array
     */
    static function getData($item): array
    {
        return [

            'id' => $item->id,

            'dtCreate' => $item->dtCreate,

            'dtUpdate' => $item->dtUpdate,

            'dtDelete' => $item->dtDelete,

            'name' => $item->name,

            'email' => $item->email,

            'permissionzz' => $item->permissionzz,

            'rolezz' => $item->rolezz,

        ];
    }
}