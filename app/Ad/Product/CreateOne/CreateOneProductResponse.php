<?php

declare(strict_types=1);

namespace App\Ad\Product\CreateOne;

use App\AbstractBase\AbstractResponse;

use App\Models\Product;

class CreateOneProductResponse extends AbstractResponse
{
    /**
     * @param Product $item
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

            'price' => $item->price,

            'stock' => $item->stock,

            'discount' => $item->discount,

            'image' => $item->image,

            'imagezz' => $item->imagezz,

            'categoryId' => $item->categoryId,

            'aaLiked' => $item->aaLiked,

            'rating' => $item->rating,

            'aaSold' => $item->aaSold,

            'ratingzz' => $item->ratingzz,

            'dtPublish' => $item->dtPublish,

            'detail' => $item->detail,

            'shopId' => $item->shopId,

        ];
    }
}