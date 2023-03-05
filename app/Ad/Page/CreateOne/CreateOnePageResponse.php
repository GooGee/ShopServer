<?php

declare(strict_types=1);

namespace App\Ad\Page\CreateOne;

use App\AbstractBase\AbstractResponse;

use App\Models\Page;

class CreateOnePageResponse extends AbstractResponse
{
    /**
     * @param Page $item
     * @return array
     */
    static function getData($item): array
    {
        return [

            'id' => $item->id,

            'dtCreate' => $item->dtCreate,

            'dtUpdate' => $item->dtUpdate,

            'dtDelete' => $item->dtDelete,

            'title' => $item->title,

            'content' => $item->content,

        ];
    }
}