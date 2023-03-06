<?php

declare(strict_types=1);

namespace App\Models;



/**
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $dtCreate
 * @property \Illuminate\Support\Carbon $dtUpdate
 * @property \Illuminate\Support\Carbon|null $dtDelete
 * @property string $name
 * @property int $price
 * @property int $stock
 * @property int $discount
 * @property string $image
 * @property \Illuminate\Database\Eloquent\Casts\ArrayObject $imagezz
 * @property int $categoryId
 * @property int $aaLiked
 * @property int $aaSold
 * @property float $rating
 * @property \Illuminate\Database\Eloquent\Casts\ArrayObject $ratingzz
 * @property \Illuminate\Support\Carbon|null $dtPublish
 * @property string $detail
 * @property int $shopId
 *
 * @property Category $category
 * @property ProductSku[] $productSkuzz
 * @property Review[] $reviewzz
 * @property ProductVoucher[] $productVoucherzz
 * @property User[] $userzz
 * @property Voucher[] $voucherzz
 */
class ProductBase extends AbstractModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Product';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [

        'dtCreate' => 'datetime',
        'dtUpdate' => 'datetime',
        'dtDelete' => 'datetime',
        'imagezz' => 'array',
        'ratingzz' => 'array',
        'dtPublish' => 'datetime',
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
            'name',
            'price',
            'stock',
            'discount',
            'image',
            'imagezz',
            'categoryId',
            'aaLiked',
            'aaSold',
            'rating',
            'ratingzz',
            'dtPublish',
            'detail',
            'shopId',
        ];
    }



    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }

    public function productSkuzz()
    {
        return $this->hasMany(ProductSku::class, 'productId');
    }

    public function reviewzz()
    {
        return $this->hasMany(Review::class, 'productId');
    }

    public function productVoucherzz()
    {
        return $this->hasMany(ProductVoucher::class, 'productId');
    }

    public function voucherzz()
    {
        return $this->belongsToMany(Voucher::class, 'ProductVoucher', 'productId', 'voucherId');
    }

}