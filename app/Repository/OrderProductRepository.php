<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\OrderProduct;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method OrderProduct|null find(int $id)
 * @method OrderProduct findOrFail(int $id)
 */
class OrderProductRepository extends AbstractRepository
{

    function query(): Builder
    {
        return OrderProduct::query();
    }

}