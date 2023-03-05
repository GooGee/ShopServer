<?php

declare(strict_types=1);

namespace App\Ad\Trend\CreateOne;

use App\AbstractBase\AbstractResponse;

use App\Models\Trend;

class CreateOneTrendResponse extends AbstractResponse
{
    /**
     * @param Trend $item
     * @return array
     */
    static function getData($item): array
    {
        return [

            'amount' => $item->amount,

            'dtDelete' => $item->dtDelete,

            'dtUpdate' => $item->dtUpdate,

            'dtCreate' => $item->dtCreate,

            'id' => $item->id,

            'type' => $item->type,

        ];
    }
}