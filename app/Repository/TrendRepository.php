<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\Trend;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Trend|null find(int $id)
 * @method Trend findOrFail(int $id)
 */
class TrendRepository extends AbstractRepository
{

    function query(): Builder
    {
        return Trend::query();
    }

}