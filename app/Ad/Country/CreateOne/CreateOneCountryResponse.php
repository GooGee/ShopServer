<?php

declare(strict_types=1);

namespace App\Ad\Country\CreateOne;

use App\AbstractBase\AbstractResponse;

use App\Models\Country;

class CreateOneCountryResponse extends AbstractResponse
{
    /**
     * @param Country $item
     * @return array
     */
    static function getData($item): array
    {
        return [

            'id' => $item->id,

            'dtCreate' => $item->dtCreate,

            'dtUpdate' => $item->dtUpdate,

            'name' => $item->name,

            'dtDelete' => $item->dtDelete,

        ];
    }
}