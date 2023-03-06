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
 * @property \Illuminate\Support\Carbon|null $dtSuspend
 *
 * @property AdminSession[] $adminSessionzz
 */
class AdminBase extends AbstractUser
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'Admin';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [

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
            'email',
        ];
    }



    public function adminSessionzz()
    {
        return $this->hasMany(AdminSession::class, 'adminId');
    }

}