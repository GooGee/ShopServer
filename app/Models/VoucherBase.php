<?php

declare(strict_types=1);

namespace App\Models;



/**
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $dtCreate
 * @property \Illuminate\Support\Carbon $dtUpdate
 * @property \Illuminate\Support\Carbon|null $dtDelete
 * @property string $type
 * @property int $amount
 * @property int $limit
 * @property string $code
 * @property \Illuminate\Support\Carbon|null $dtStart
 * @property \Illuminate\Support\Carbon|null $dtEnd
 * @property string $name
 *
 * @property ProductVoucher[] $productVoucherzz
 * @property Product[] $productzz
 */
class VoucherBase extends AbstractModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Voucher';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [

        'dtCreate' => 'datetime',
        'dtUpdate' => 'datetime',
        'dtDelete' => 'datetime',
        'dtStart' => 'datetime',
        'dtEnd' => 'datetime',
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
            'type',
            'amount',
            'limit',
            'code',
            'dtStart',
            'dtEnd',
            'name',
        ];
    }



    public function productVoucherzz()
    {
        return $this->hasMany(ProductVoucher::class, 'voucherId');
    }

    public function productzz()
    {
        return $this->belongsToMany(Product::class, 'ProductVoucher', 'voucherId', 'productId');
    }

}