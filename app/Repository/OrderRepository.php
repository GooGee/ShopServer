<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Order|null find(int $id)
 * @method Order findOrFail(int $id)
 */
class OrderRepository extends AbstractRepository
{

    function query(): Builder
    {
        return Order::query();
    }

}