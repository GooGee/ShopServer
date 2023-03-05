<?php

declare(strict_types=1);

namespace App\Ad\Setting\CreateOne;

use App\AbstractBase\AbstractResponse;

use App\Models\Setting;

class CreateOneSettingResponse extends AbstractResponse
{
    /**
     * @param Setting $item
     * @return array
     */
    static function getData($item): array
    {
        return [

            'id' => $item->id,

            'dtCreate' => $item->dtCreate,

            'dtUpdate' => $item->dtUpdate,

            'dtDelete' => $item->dtDelete,

            'name' => $item->name,

            'value' => $item->value,

            'type' => $item->type,

            'rac' => $item->rac,

        ];
    }
}