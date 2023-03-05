<?php

declare(strict_types=1);

namespace App\Api\CartProduct\UpdateOne;

use App\AbstractBase\AbstractRequest;

class UpdateOneCartProductRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'amount' => [
                'required',
                'integer',
                'min:1',
            ],


        ];
    }
}