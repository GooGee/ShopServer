<?php

declare(strict_types=1);

namespace App\Ad\Voucher\ReadPage;

use App\AbstractBase\ReadPageRequest;
use App\Models\Voucher;
use Illuminate\Validation\Rule;

class ReadPageVoucherRequest extends ReadPageRequest
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

            'type' => [
                'required',
                'string',
                'max:111',
                'sometimes',
                Rule::in(Voucher::Typezz),
            ],

            'name' => [
                'required',
                'string',
                'max:111',
                'sometimes',
            ],

            'code' => [
                'required',
                'string',
                'max:111',
                'sometimes',
            ],


        ];
    }
}