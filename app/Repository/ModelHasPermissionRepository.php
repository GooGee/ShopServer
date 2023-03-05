<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\ModelHasPermission;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method ModelHasPermission|null find(int $id)
 * @method ModelHasPermission findOrFail(int $id)
 */
class ModelHasPermissionRepository extends AbstractRepository
{

    function query(): Builder
    {
        return ModelHasPermission::query();
    }

}