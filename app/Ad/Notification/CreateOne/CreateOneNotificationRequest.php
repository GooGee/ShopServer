<?php

declare(strict_types=1);

namespace App\Ad\Notification\CreateOne;

use App\AbstractBase\AbstractRequest;

class CreateOneNotificationRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'text' => [
                'required',
                'string',
                'max:1222',
            ],


        ];
    }
}