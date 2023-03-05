<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\AttributeValue;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method AttributeValue|null find(int $id)
 * @method AttributeValue findOrFail(int $id)
 */
class AttributeValueRepository extends AbstractRepository
{

    function query(): Builder
    {
        return AttributeValue::query();
    }

}