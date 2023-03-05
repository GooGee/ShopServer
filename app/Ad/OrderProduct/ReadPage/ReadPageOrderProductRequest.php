<?php

declare(strict_types=1);

namespace App\Ad\OrderProduct\ReadPage;

use App\AbstractBase\ReadPageRequest;

class ReadPageOrderProductRequest extends ReadPageRequest
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

            'orderId' => [
                'required',
                'integer',
                'min:1',
            ],


        ];
    }
}