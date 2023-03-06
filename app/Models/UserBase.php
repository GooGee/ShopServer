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
 * @property string $email
 * @property string $password
 * @property string|null $remember_token
 * @property int $aaOrder
 * @property int $aaSpend
 *
 * @property Address[] $addresszz
 * @property CartProduct[] $cartProductzz
 * @property Order[] $orderzz
 * @property Review[] $reviewzz
 * @property Post[] $postzz
 * @property Country[] $countryzz
 * @property ProductSku[] $productSkuzz
 * @property Product[] $productzz
 * @property Admin[] $adminzz
 */
class UserBase extends AbstractUser
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'User';

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

        'password',
        'remember_token',
    ];

    static function keyzz(): array
    {
        return [

            'id',
            'dtCreate',
            'dtUpdate',
            'dtDelete',
            'name',
            'email',
            'aaOrder',
            'aaSpend',
        ];
    }



    public function addresszz()
    {
        return $this->hasMany(Address::class, 'userId');
    }

    public function postzz()
    {
        return $this->hasMany(Post::class, 'userId');
    }

    public function cartProductzz()
    {
        return $this->hasMany(CartProduct::class, 'userId');
    }

    public function orderzz()
    {
        return $this->hasMany(Order::class, 'userId');
    }

    public function reviewzz()
    {
        return $this->hasMany(Review::class, 'userId');
    }

}