<?php

declare(strict_types=1);

namespace App\Ad\Chart\ReadOne;

use App\AbstractBase\AbstractResponse;

class ReadOneChartResponse extends AbstractResponse
{
    static function getData($item): array
    {
        return (array)$item;
    }
}