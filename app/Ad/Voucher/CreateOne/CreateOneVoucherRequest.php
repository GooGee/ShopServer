<?php

declare(strict_types=1);

namespace App\Ad\Voucher\CreateOne;

use App\AbstractBase\AbstractRequest;
use App\Models\Voucher;
use Illuminate\Validation\Rule;

class CreateOneVoucherRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'type' => [
                'required',
                'string',
                'max:111',
                Rule::in(Voucher::Typezz),
            ],

            'amount' => [
                'required',
                'integer',
                'min:0',
            ],

            'limit' => [
                'required',
                'integer',
                'min:0',
            ],

            'code' => [
                'required',
                'string',
                'max:111',
            ],

            'dtStart' => [
                'nullable',
                'present',
            ],

            'dtEnd' => [
                'nullable',
                'present',
            ],

            'name' => [
                'required',
                'string',
                'max:111',
            ],


        ];
    }
}