<?php

declare(strict_types=1);

namespace App\Models;



/**
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $dtCreate
 * @property \Illuminate\Support\Carbon $dtUpdate
 * @property \Illuminate\Support\Carbon|null $dtDelete
 * @property int $productId
 * @property int $price
 * @property int $stock
 * @property \Illuminate\Database\Eloquent\Casts\ArrayObject $variationzz
 *
 * @property Product $product
 * @property CartProduct[] $cartProductzz
 * @property OrderProduct[] $orderProductzz
 * @property User[] $userzz
 * @property Order[] $orderzz
 */
class ProductSkuBase extends AbstractModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ProductSku';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [

        'dtCreate' => 'datetime',
        'dtUpdate' => 'datetime',
        'dtDelete' => 'datetime',
        'variationzz' => 'array',
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
            'productId',
            'price',
            'stock',
            'variationzz',
        ];
    }



    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }

    public function cartProductzz()
    {
        return $this->hasMany(CartProduct::class, 'productSkuId');
    }

    public function orderProductzz()
    {
        return $this->hasMany(OrderProduct::class, 'productSkuId');
    }

    public function userzz()
    {
        return $this->belongsToMany(User::class, 'CartProduct', 'productSkuId', 'userId');
    }

    public function orderzz()
    {
        return $this->belongsToMany(Order::class, 'OrderProduct', 'productSkuId', 'orderId');
    }

}