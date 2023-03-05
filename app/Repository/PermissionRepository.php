<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\Permission;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Permission|null find(int $id)
 * @method Permission findOrFail(int $id)
 */
class PermissionRepository extends AbstractRepository
{

    function query(): Builder
    {
        return Permission::query();
    }

}