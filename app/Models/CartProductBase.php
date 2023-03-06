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
 * @property int $productSkuId
 * @property int $amount
 *
 * @property User $user
 * @property ProductSku $productSku
 */
class CartProductBase extends AbstractModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'CartProduct';

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
            'userId',
            'productSkuId',
            'amount',
        ];
    }



    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function productSku()
    {
        return $this->belongsTo(ProductSku::class, 'productSkuId');
    }

}