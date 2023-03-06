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
 * @property int $productId
 * @property string $text
 * @property int $rating
 * @property int $soi
 *
 * @property User $user
 * @property Product $product
 * @property Post[] $postzz
 * @property Admin[] $adminzz
 * @property User[] $userzz
 */
class ReviewBase extends AbstractModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Review';

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
            'productId',
            'text',
            'rating',
            'soi',
        ];
    }



    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }

    public function postzz()
    {
        return $this->hasMany(Post::class, 'reviewId');
    }

    public function adminzz()
    {
        return $this->belongsToMany(Admin::class, 'Post', 'reviewId', 'adminId');
    }

    public function userzz()
    {
        return $this->belongsToMany(User::class, 'Post', 'reviewId', 'userId');
    }

}