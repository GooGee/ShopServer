<?php

declare(strict_types=1);

namespace App\Models;



/**
 *
 * @property int $role_id
 * @property string $model_type
 * @property int $model_id
 * @property int $id
 *
 * @property Role $rolezz
 */
class ModelHasRoleBase extends AbstractModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'model_has_roles';

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

            'role_id',
            'model_type',
            'model_id',
            'id',
        ];
    }



    public function rolezz()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

}