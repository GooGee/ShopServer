<?php

declare(strict_types=1);

namespace App\Ad\Setting\UpdateOne;

use App\AbstractBase\AbstractRequest;

class UpdateOneSettingRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'value' => [
                'string',
                'max:111',
                'present',
            ],


        ];
    }
}