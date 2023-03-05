<?php

declare(strict_types=1);

namespace App\Ad\Tag\CreateOne;

use App\AbstractBase\AbstractResponse;

use App\Models\Tag;

class CreateOneTagResponse extends AbstractResponse
{
    /**
     * @param Tag $item
     * @return array
     */
    static function getData($item): array
    {
        return [

            'name' => $item->name,

            'dtUpdate' => $item->dtUpdate,

            'dtCreate' => $item->dtCreate,

            'id' => $item->id,

            'dtDelete' => $item->dtDelete,

        ];
    }
}