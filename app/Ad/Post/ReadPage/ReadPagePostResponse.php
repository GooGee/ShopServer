<?php

declare(strict_types=1);

namespace App\Ad\Post\ReadPage;

use App\AbstractBase\AbstractResponse;

use App\Models\Post;

class ReadPagePostResponse extends AbstractResponse
{
    /**
     * @param Post $item
     * @return array
     */
    static function getData($item): array
    {
        return [

            'id' => $item->id,

            'dtCreate' => $item->dtCreate,

            'dtUpdate' => $item->dtUpdate,

            'dtDelete' => $item->dtDelete,

            'reviewId' => $item->reviewId,

            'adminId' => $item->adminId,

            'userId' => $item->userId,

            'text' => $item->text,

            'admin' => $item->admin,
            'user' => $item->user,

        ];
    }
}