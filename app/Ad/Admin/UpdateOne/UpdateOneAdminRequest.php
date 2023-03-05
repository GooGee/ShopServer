<?php

declare(strict_types=1);

namespace App\Ad\Admin\UpdateOne;

use App\AbstractBase\AbstractRequest;

class UpdateOneAdminRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'password' => [
                'required',
                'string',
                'max:33',
                'min:8',
            ],


        ];
    }
}