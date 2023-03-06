<?php

declare(strict_types=1);

namespace App\Models;



/**
 *
 * @property int $permission_id
 * @property string $model_type
 * @property int $model_id
 * @property int $id
 *
 * @property Permission $permissionzz
 */
class ModelHasPermissionBase extends AbstractModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'model_has_permissions';

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

            'permission_id',
            'model_type',
            'model_id',
            'id',
        ];
    }



    public function permissionzz()
    {
        return $this->belongsTo(Permission::class, 'permission_id');
    }

}