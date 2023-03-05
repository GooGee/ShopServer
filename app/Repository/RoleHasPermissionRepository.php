<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\RoleHasPermission;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method RoleHasPermission|null find(int $id)
 * @method RoleHasPermission findOrFail(int $id)
 */
class RoleHasPermissionRepository extends AbstractRepository
{

    function query(): Builder
    {
        return RoleHasPermission::query();
    }

}