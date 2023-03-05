<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\CartProduct;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method CartProduct|null find(int $id)
 * @method CartProduct findOrFail(int $id)
 */
class CartProductRepository extends AbstractRepository
{

    function query(): Builder
    {
        return CartProduct::query();
    }

}