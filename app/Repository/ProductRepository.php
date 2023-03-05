<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Product|null find(int $id)
 * @method Product findOrFail(int $id)
 */
class ProductRepository extends AbstractRepository
{

    function query(): Builder
    {
        return Product::query();
    }

}