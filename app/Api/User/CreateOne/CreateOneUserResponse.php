<?php

declare(strict_types=1);

namespace App\Api\User\CreateOne;

use App\AbstractBase\AbstractResponse;

use App\Models\User;

class CreateOneUserResponse extends AbstractResponse
{
    /**
     * @param User $item
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

            'aaOrder' => $item->aaOrder,

            'aaSpend' => $item->aaSpend,

        ];
    }
}