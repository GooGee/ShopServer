<?php

declare(strict_types=1);

namespace App\Api\User\CreateOne;

use App\AbstractBase\AbstractRequest;

class CreateOneUserRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'name' => [
                'unique:User',
                'required',
                'string',
                'max:33',
            ],

            'email' => [
                'unique:User',
                'required',
                'string',
                'max:111',
                'email',
            ],

            'password' => [
                'required',
                'string',
                'max:111',
                'min:8',
            ],


        ];
    }
}