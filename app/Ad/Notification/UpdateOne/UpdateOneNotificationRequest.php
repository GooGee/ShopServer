<?php

declare(strict_types=1);

namespace App\Ad\Notification\UpdateOne;

use App\AbstractBase\AbstractRequest;

class UpdateOneNotificationRequest extends AbstractRequest
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