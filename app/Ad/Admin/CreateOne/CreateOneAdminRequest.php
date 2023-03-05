<?php

declare(strict_types=1);

namespace App\Ad\Admin\CreateOne;

use App\AbstractBase\AbstractRequest;

class CreateOneAdminRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'name' => [
                'unique:Admin',
                'required',
                'string',
                'max:33',
                'regex:/^[A-Za-z][A-Za-z0-9]{2,33}$/',
            ],

            'email' => [
                'unique:Admin',
                'required',
                'string',
                'max:111',
                'email',
            ],

            'password' => [
                'required',
                'string',
                'max:33',
                'min:8',
            ],


        ];
    }
}