<?php

declare(strict_types=1);

namespace App\Models;



/**
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $dtCreate
 * @property \Illuminate\Support\Carbon $dtUpdate
 * @property \Illuminate\Support\Carbon|null $dtDelete
 * @property int $userId
 * @property int $sum
 * @property \Illuminate\Support\Carbon|null $dtCancel
 * @property \Illuminate\Support\Carbon|null $dtExpire
 * @property \Illuminate\Support\Carbon|null $dtFulfill
 * @property \Illuminate\Support\Carbon|null $dtPay
 * @property \Illuminate\Support\Carbon|null $dtReceive
 * @property \Illuminate\Support\Carbon|null $dtRefund
 * @property \Illuminate\Support\Carbon|null $dtReturn
 * @property string $status
 * @property string $statusPayment
 * @property int $addressId
 *
 * @property User $user
 * @property OrderProduct[] $orderProductzz
 * @property Address $address
 * @property ProductSku[] $productSkuzz
 */
class OrderBase extends AbstractModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Order';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [

        'dtCreate' => 'datetime',
        'dtUpdate' => 'datetime',
        'dtDelete' => 'datetime',
        'dtCancel' => 'datetime',
        'dtExpire' => 'datetime',
        'dtFulfill' => 'datetime',
        'dtPay' => 'datetime',
        'dtReceive' => 'datetime',
        'dtRefund' => 'datetime',
        'dtReturn' => 'datetime',
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
            'userId',
            'sum',
            'dtCancel',
            'dtExpire',
            'dtFulfill',
            'dtPay',
            'dtReceive',
            'dtRefund',
            'dtReturn',
            'status',
            'statusPayment',
            'addressId',
        ];
    }



    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function orderProductzz()
    {
        return $this->hasMany(OrderProduct::class, 'orderId');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'addressId');
    }

    public function productSkuzz()
    {
        return $this->belongsToMany(ProductSku::class, 'OrderProduct', 'orderId', 'productSkuId');
    }

}