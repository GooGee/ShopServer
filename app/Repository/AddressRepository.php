<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\Address;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Address|null find(int $id)
 * @method Address findOrFail(int $id)
 */
class AddressRepository extends AbstractRepository
{

    function query(): Builder
    {
        return Address::query();
    }

}