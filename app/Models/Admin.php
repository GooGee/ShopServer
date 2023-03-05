<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Traits\HasRoles;

class Admin extends AdminBase
{
    use HasRoles;

    const Guard = 'admin';
    const SystemId = 1;
    const SuperAdminId = 2;

    public function permissionzz(): BelongsToMany
    {
        return $this->permissions()->withPivot(['id']);
    }

    public function rolezz(): BelongsToMany
    {
        return $this->roles()->withPivot(['id']);
    }
}