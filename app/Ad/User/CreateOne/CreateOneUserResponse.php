<?php

declare(strict_types=1);

namespace App\Ad\User\CreateOne;

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

            'email' => $item->email,
            'aaOrder' => $item->aaOrder,

            'aaSpend' => $item->aaSpend,

        ];
    }
}