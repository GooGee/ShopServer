<?php

declare(strict_types=1);

namespace App\Ad\ProductVoucher\ReadPage;

use App\AbstractBase\ReadPageRequest;

class ReadPageProductVoucherRequest extends ReadPageRequest
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

            'voucherId' => [
                'required',
                'exists:Voucher,id',
                'integer',
                'min:1',
                'sometimes',
            ],


        ];
    }
}