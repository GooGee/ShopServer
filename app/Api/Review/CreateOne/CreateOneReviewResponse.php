<?php

declare(strict_types=1);

namespace App\Api\Review\CreateOne;

use App\AbstractBase\AbstractResponse;

use App\Models\Review;

class CreateOneReviewResponse extends AbstractResponse
{
    /**
     * @param Review $item
     * @return array
     */
    static function getData($item): array
    {
        return [

            'id' => $item->id,

            'dtCreate' => $item->dtCreate,

            'dtUpdate' => $item->dtUpdate,

            'dtDelete' => $item->dtDelete,

            'userId' => $item->userId,

            'productId' => $item->productId,

            'text' => $item->text,

            'rating' => $item->rating,

            'soi' => $item->soi,

        ];
    }
}