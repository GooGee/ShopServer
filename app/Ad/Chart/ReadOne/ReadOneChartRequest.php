<?php

declare(strict_types=1);

namespace App\Ad\Chart\ReadOne;

use App\AbstractBase\AbstractRequest;

class ReadOneChartRequest extends AbstractRequest
{
    static function getRulezz()
    {
        return [

            'length' => [
                'required',
                'integer',
                'min:14',
                'max:61',
            ],


        ];
    }
}
