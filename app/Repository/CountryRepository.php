<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\Country;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Country|null find(int $id)
 * @method Country findOrFail(int $id)
 */
class CountryRepository extends AbstractRepository
{

    function query(): Builder
    {
        return Country::query();
    }

}