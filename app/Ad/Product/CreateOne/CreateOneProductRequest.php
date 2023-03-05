<?php

declare(strict_types=1);

namespace App\Ad\Product\CreateOne;

use App\AbstractBase\AbstractRequest;

class CreateOneProductRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'name' => [
                'required',
                'string',
                'max:333',
            ],

            'price' => [
                'required',
                'min:1000',
                'integer',
            ],

            'stock' => [
                'required',
                'integer',
                'min:0',
            ],

            'image' => [
                'required',
                'string',
                'max:111',
            ],

            'imagezz' => [
                'required',
                'max:11',
                'array',
            ],

            'categoryId' => [
                'required',
                'exists:Category,id',
                'integer',
                'min:1',
            ],

            'discount' => [
                'required',
                'integer',
                'max:99',
                'min:0',
            ],

            'detail' => [
                'required',
                'string',
            ],


        ];
    }
}