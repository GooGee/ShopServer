<?php

declare(strict_types=1);

namespace App\Models;



/**
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $dtCreate
 * @property \Illuminate\Support\Carbon $dtUpdate
 * @property \Illuminate\Support\Carbon|null $dtDelete
 * @property int $countryId
 * @property int $userId
 * @property int $zip
 * @property string $name
 * @property string $phone
 * @property string $text
 *
 * @property Country $country
 * @property User $user
 * @property Order[] $orderzz
 * @property User[] $userzz
 */
class AddressBase extends AbstractModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Address';

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
            'countryId',
            'userId',
            'zip',
            'name',
            'phone',
            'text',
        ];
    }



    public function country()
    {
        return $this->belongsTo(Country::class, 'countryId');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'userId');
    }

    public function orderzz()
    {
        return $this->hasMany(Order::class, 'addressId');
    }

    public function userzz()
    {
        return $this->belongsToMany(User::class, 'Order', 'addressId', 'userId');
    }

}