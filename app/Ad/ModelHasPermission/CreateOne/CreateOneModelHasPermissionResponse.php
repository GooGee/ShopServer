<?php

declare(strict_types=1);

namespace App\Ad\ModelHasPermission\CreateOne;

use App\AbstractBase\AbstractResponse;

use App\Models\ModelHasPermission;

class CreateOneModelHasPermissionResponse extends AbstractResponse
{
    /**
     * @param ModelHasPermission $item
     * @return array
     */
    static function getData($item): array
    {
        return [

            'permission_id' => $item->permission_id,

            'model_type' => $item->model_type,

            'model_id' => $item->model_id,

            'id' => $item->id,

        ];
    }
}