<?php

declare(strict_types=1);

namespace App\Ad\Me\ReadOne;

use App\AbstractBase\AbstractResponse;
use App\Ad\Admin\CreateOne\CreateOneAdminResponse;
use App\Models\Admin;

class ReadOneMeResponse extends AbstractResponse
{
    /**
     * @param Admin $item
     * @return array
     */
    static function getData($item): array
    {
        $data = CreateOneAdminResponse::getData($item);
        $data['permissionzz'] = $item->permissionzz->pluck('name')->all();
        return $data;
    }
}