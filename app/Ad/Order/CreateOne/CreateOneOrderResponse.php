<?php

declare(strict_types=1);

namespace App\Ad\Order\CreateOne;

use App\AbstractBase\AbstractResponse;

use App\Models\Order;

class CreateOneOrderResponse extends AbstractResponse
{
    /**
     * @param Order $item
     * @return array
     */
    static function getData($item): array
    {
        return [

            'dtPay' => $item->dtPay,

            'dtFulfill' => $item->dtFulfill,

            'dtExpire' => $item->dtExpire,

            'dtCancel' => $item->dtCancel,

            'sum' => $item->sum,

            'userId' => $item->userId,

            'dtDelete' => $item->dtDelete,

            'dtUpdate' => $item->dtUpdate,

            'dtCreate' => $item->dtCreate,

            'id' => $item->id,

            'dtReceive' => $item->dtReceive,

            'dtRefund' => $item->dtRefund,

            'dtReturn' => $item->dtReturn,

            'status' => $item->status,

            'statusPayment' => $item->statusPayment,

            'addressId' => $item->addressId,

        ];
    }
}