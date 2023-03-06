<?php

declare(strict_types=1);

namespace App\Models;



use App\Service\TraitBase\GetClassName;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 *
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property \Illuminate\Support\Carbon $dtCreate
 * @property \Illuminate\Support\Carbon $dtUpdate
 * @property \Illuminate\Support\Carbon|null $dtDelete
 * @property string $moderator
 *
 * @property RoleHasPermission[] $roleHasPermissionszz
 * @property ModelHasPermission[] $modelHasPermissionszz
 * @property Role[] $roleszz
 */
class PermissionBase extends \Spatie\Permission\Models\Permission
{
    use GetClassName;
    use HasFactory;

    public static $snakeAttributes = false;

    /**
     * The name of the "created at" column.
     *
     * @var string|null
     */
    const CREATED_AT = 'dtCreate';

    /**
     * The name of the "updated at" column.
     *
     * @var string|null
     */
    const UPDATED_AT = 'dtUpdate';

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param \DateTimeInterface $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permissions';

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
            'name',
            'guard_name',
            'dtCreate',
            'dtUpdate',
            'dtDelete',
            'moderator',
        ];
    }



    public function roleHasPermissionszz()
    {
        return $this->hasMany(RoleHasPermission::class, 'permission_id');
    }

    public function modelHasPermissionszz()
    {
        return $this->hasMany(ModelHasPermission::class, 'permission_id');
    }

    public function roleszz()
    {
        return $this->belongsToMany(Role::class, 'RoleHasPermission', 'permission_id', 'role_id');
    }

}