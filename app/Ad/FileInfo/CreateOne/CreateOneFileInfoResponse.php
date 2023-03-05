<?php

declare(strict_types=1);

namespace App\Ad\FileInfo\CreateOne;

use App\AbstractBase\AbstractResponse;

use App\Models\FileInfo;

class CreateOneFileInfoResponse extends AbstractResponse
{
    /**
     * @param FileInfo $item
     * @return array
     */
    static function getData($item): array
    {
        return [

            'id' => $item->id,

            'dtCreate' => $item->dtCreate,

            'dtUpdate' => $item->dtUpdate,

            'dtDelete' => $item->dtDelete,

            'location' => $item->location,

            'uri' => $item->uri,

            'mime' => $item->mime,

            'width' => $item->width,

            'height' => $item->height,

        ];
    }
}