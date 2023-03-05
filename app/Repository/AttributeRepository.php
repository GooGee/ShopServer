<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\Attribute;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Attribute|null find(int $id)
 * @method Attribute findOrFail(int $id)
 */
class AttributeRepository extends AbstractRepository
{

    function query(): Builder
    {
        return Attribute::query();
    }

}