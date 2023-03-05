<?php

declare(strict_types=1);

namespace App\Ad\Category\ReadMany;

use App\AbstractBase\AbstractResponse;

use App\Models\Category;

class ReadManyCategoryResponse extends AbstractResponse
{
    /**
     * @param Category $item
     * @return array
     */
    static function getData($item): array
    {
        return [

            'id' => $item->id,

            'dtCreate' => $item->dtCreate,

            'dtUpdate' => $item->dtUpdate,

            'name' => $item->name,

            'parentId' => $item->parentId,

            'image' => $item->image,

            'dtDelete' => $item->dtDelete,

        ];
    }
}