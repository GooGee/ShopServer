<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\Operation;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Operation|null find(int $id)
 * @method Operation findOrFail(int $id)
 */
class OperationRepository extends AbstractRepository
{

    function query(): Builder
    {
        return Operation::query();
    }

}