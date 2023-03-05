<?php

declare(strict_types=1);

namespace App\Ad\Operation\CreateOne;

use App\AbstractBase\AbstractResponse;

use App\Models\Operation;

class CreateOneOperationResponse extends AbstractResponse
{
    /**
     * @param Operation $item
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

            'text' => $item->text,

            'adminId' => $item->adminId,

        ];
    }
}