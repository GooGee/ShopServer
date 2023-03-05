<?php

declare(strict_types=1);

namespace App\Models;



/**
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon $dtCreate
 * @property \Illuminate\Support\Carbon $dtUpdate
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $dtDelete
 *
 * @property Address[] addresszz
 * @property User[] userzz
 */
class CountryBase extends AbstractModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Country';

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
            'name',
            'dtDelete',
        ];
    }



    public function addresszz()
    {
        return $this->hasMany(Address::class, 'countryId');
    }

    public function userzz()
    {
        return $this->belongsToMany(User::class, 'Address', 'countryId', 'userId');
    }

}