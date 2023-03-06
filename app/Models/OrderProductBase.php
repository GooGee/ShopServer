<?php

declare(strict_types=1);

namespace App\Models;



/**
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $dtCreate
 * @property \Illuminate\Support\Carbon $dtUpdate
 * @property \Illuminate\Support\Carbon|null $dtDelete
 * @property int $orderId
 * @property int $amount
 * @property int $price
 * @property int $productSkuId
 *
 * @property Order $order
 * @property ProductSku $productSku
 */
class OrderProductBase extends AbstractModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'OrderProduct';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [

        'dtCreate' => 'datetime',
        'dtUpdate' => 'datetime',
        'dtDelete' => 'datetime',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [

    ];

    static function keyzz(): array
    {
        return [

            'id',
            'dtCreate',
            'dtUpdate',
            'dtDelete',
            'orderId',
            'amount',
            'price',
            'productSkuId',
        ];
    }



    public function order()
    {
        return $this->belongsTo(Order::class, 'orderId');
    }

    public function productSku()
    {
        return $this->belongsTo(ProductSku::class, 'productSkuId');
    }

}