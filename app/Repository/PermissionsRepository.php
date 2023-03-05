<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\Permissions;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Permissions|null find(int $id)
 * @method Permissions findOrFail(int $id)
 */
class PermissionsRepository extends AbstractRepository
{

    function query(): Builder
    {
        return Permissions::query();
    }

}