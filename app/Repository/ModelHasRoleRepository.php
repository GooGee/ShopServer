<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\ModelHasRole;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method ModelHasRole|null find(int $id)
 * @method ModelHasRole findOrFail(int $id)
 */
class ModelHasRoleRepository extends AbstractRepository
{

    function query(): Builder
    {
        return ModelHasRole::query();
    }

}