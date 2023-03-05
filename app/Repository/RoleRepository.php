<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\Role;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Role|null find(int $id)
 * @method Role findOrFail(int $id)
 */
class RoleRepository extends AbstractRepository
{

    function query(): Builder
    {
        return Role::query();
    }

}