<?php

declare(strict_types=1);

namespace App\Ad\Setting\CreateOne;

use App\AbstractBase\AbstractRequest;

class CreateOneSettingRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'name' => [
                'unique:Setting',
                'required',
                'string',
                'max:111',
                'unique:Setting',
            ],

            'value' => [
                'string',
                'max:111',
                'present',
            ],

            'type' => [
                'required',
                'string',
                'max:111',
            ],

            'rac' => [
                'required',
                'string',
                'max:111',
            ],


        ];
    }
}