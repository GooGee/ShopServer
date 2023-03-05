<?php

declare(strict_types=1);

namespace App\Ad\Notification\CreateOne;

use App\AbstractBase\AbstractResponse;

use App\Models\Notification;

class CreateOneNotificationResponse extends AbstractResponse
{
    /**
     * @param Notification $item
     * @return array
     */
    static function getData($item): array
    {
        return [

            'id' => $item->id,

            'dtCreate' => $item->dtCreate,

            'dtUpdate' => $item->dtUpdate,

            'dtDelete' => $item->dtDelete,

            'text' => $item->text,

        ];
    }
}