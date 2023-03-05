<?php

declare(strict_types=1);

namespace App\Ad\Review\CreateOne;

use App\AbstractBase\AbstractRequest;

class CreateOneReviewRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'text' => [
                'required',
                'string',
                'max:1222',
            ],

            'productId' => [
                'required',
                'exists:Product,id',
                'integer',
                'min:1',
            ],

            'rating' => [
                'required',
                'integer',
                'min:1',
                'max:5',
            ],


        ];
    }
}