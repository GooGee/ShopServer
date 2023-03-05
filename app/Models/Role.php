<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends RoleBase
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'roles';

    public function permissionzz(): BelongsToMany
    {
        return parent::permissions()->withPivot(['id']);
    }

}