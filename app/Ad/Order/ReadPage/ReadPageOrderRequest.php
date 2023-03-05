<?php

declare(strict_types=1);

namespace App\Ad\Order\ReadPage;

use App\AbstractBase\ReadPageRequest;

class ReadPageOrderRequest extends ReadPageRequest
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

            'status' => [
                'required',
                'string',
                'max:111',
                'sometimes',
            ],

            'statusPayment' => [
                'required',
                'string',
                'max:111',
                'sometimes',
            ],

            'id' => [
                'required',
                'integer',
                'min:1',
                'sometimes',
            ],


            'dtStart' => [
                'required',
                'date',
                'sometimes',
            ],

            'dtEnd' => [
                'required',
                'date',
                'sometimes',
            ],

        ];
    }
}