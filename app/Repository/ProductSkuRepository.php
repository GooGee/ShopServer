<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\ProductSku;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method ProductSku|null find(int $id)
 * @method ProductSku findOrFail(int $id)
 */
class ProductSkuRepository extends AbstractRepository
{

    function query(): Builder
    {
        return ProductSku::query();
    }

}