<?php

declare(strict_types=1);

namespace App\Ad\ModelHasRole\CreateOne;

use App\AbstractBase\AbstractResponse;

use App\Models\ModelHasRole;

class CreateOneModelHasRoleResponse extends AbstractResponse
{
    /**
     * @param ModelHasRole $item
     * @return array
     */
    static function getData($item): array
    {
        return [

            'id' => $item->id,

            'model_id' => $item->model_id,

            'model_type' => $item->model_type,

            'role_id' => $item->role_id,

        ];
    }
}