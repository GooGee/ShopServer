<?php

declare(strict_types=1);

namespace App\Api\CartProduct\ReadPage;

use App\AbstractBase\ReadPageRequest;

class ReadPageCartProductRequest extends ReadPageRequest
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


        ];
    }
}