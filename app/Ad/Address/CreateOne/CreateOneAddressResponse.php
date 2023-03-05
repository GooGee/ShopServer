<?php

declare(strict_types=1);

namespace App\Ad\Address\CreateOne;

use App\AbstractBase\AbstractResponse;

use App\Models\Address;

class CreateOneAddressResponse extends AbstractResponse
{
    /**
     * @param Address $item
     * @return array
     */
    static function getData($item): array
    {
        return [

            'id' => $item->id,

            'dtCreate' => $item->dtCreate,

            'dtUpdate' => $item->dtUpdate,

            'dtDelete' => $item->dtDelete,

            'countryId' => $item->countryId,

            'userId' => $item->userId,

            'zip' => $item->zip,

            'name' => $item->name,

            'phone' => $item->phone,

            'text' => $item->text,

        ];
    }
}