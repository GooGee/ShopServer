<?php

declare(strict_types=1);

namespace App\Ad\ProductSku\ReadPage;

use App\AbstractBase\ReadPageRequest;

class ReadPageProductSkuRequest extends ReadPageRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return static::getRulezzForPage();
    }

    static function getRulezz()
    {
        return [

            'productId' => [
                'required',
                'exists:Product,id',
                'integer',
                'min:1',
                'sometimes',
            ],


        ];
    }
}