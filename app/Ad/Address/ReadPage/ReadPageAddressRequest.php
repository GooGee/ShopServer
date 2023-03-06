<?php

declare(strict_types=1);

namespace App\Ad\Address\ReadPage;

use App\AbstractBase\ReadPageRequest;

class ReadPageAddressRequest extends ReadPageRequest
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

            'userId' => [
                'required',
                'exists:User,id',
                'integer',
                'min:1',
                'sometimes',
            ],

            'zip' => [
                'required',
                'integer',
                'min:111',
                'sometimes',
            ],

            'name' => [
                'required',
                'string',
                'max:33',
                'sometimes',
            ],

            'phone' => [
                'required',
                'string',
                'max:33',
                'sometimes',
            ],

            'text' => [
                'required',
                'string',
                'max:333',
                'sometimes',
            ],


        ];
    }
}