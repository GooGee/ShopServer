<?php

declare(strict_types=1);

namespace App\Ad\ProductVoucher\CreateOne;

use App\AbstractBase\AbstractRequest;

class CreateOneProductVoucherRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'productId' => [
                'required',
                'exists:Product,id',
                'integer',
                'min:1',
            ],

            'voucherId' => [
                'required',
                'exists:Voucher,id',
                'integer',
                'min:1',
            ],


        ];
    }
}