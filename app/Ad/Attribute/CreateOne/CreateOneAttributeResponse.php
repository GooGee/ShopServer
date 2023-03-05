<?php

declare(strict_types=1);

namespace App\Ad\Attribute\CreateOne;

use App\AbstractBase\AbstractResponse;

use App\Models\Attribute;

class CreateOneAttributeResponse extends AbstractResponse
{
    /**
     * @param Attribute $item
     * @return array
     */
    static function getData($item): array
    {
        return [

            'id' => $item->id,

            'dtCreate' => $item->dtCreate,

            'dtUpdate' => $item->dtUpdate,

            'dtDelete' => $item->dtDelete,

            'categoryId' => $item->categoryId,

            'name' => $item->name,

        ];
    }
}