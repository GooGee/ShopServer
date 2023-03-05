<?php

declare(strict_types=1);

namespace App\Ad\AttributeValue\CreateOne;

use App\AbstractBase\AbstractResponse;

use App\Models\AttributeValue;

class CreateOneAttributeValueResponse extends AbstractResponse
{
    /**
     * @param AttributeValue $item
     * @return array
     */
    static function getData($item): array
    {
        return [

            'text' => $item->text,

            'dtDelete' => $item->dtDelete,

            'attributeId' => $item->attributeId,

            'dtUpdate' => $item->dtUpdate,

            'dtCreate' => $item->dtCreate,

            'id' => $item->id,

        ];
    }
}