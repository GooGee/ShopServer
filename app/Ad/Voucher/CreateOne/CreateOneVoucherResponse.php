<?php

declare(strict_types=1);

namespace App\Ad\Voucher\CreateOne;

use App\AbstractBase\AbstractResponse;

use App\Models\Voucher;

class CreateOneVoucherResponse extends AbstractResponse
{
    /**
     * @param Voucher $item
     * @return array
     */
    static function getData($item): array
    {
        return [

            'id' => $item->id,

            'dtCreate' => $item->dtCreate,

            'dtUpdate' => $item->dtUpdate,

            'dtDelete' => $item->dtDelete,

            'type' => $item->type,

            'amount' => $item->amount,

            'limit' => $item->limit,

            'code' => $item->code,

            'dtStart' => $item->dtStart,

            'dtEnd' => $item->dtEnd,

            'name' => $item->name,

        ];
    }
}