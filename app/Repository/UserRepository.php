<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method User|null find(int $id)
 * @method User findOrFail(int $id)
 */
class UserRepository extends AbstractRepository
{

    function query(): Builder
    {
        return User::query();
    }

}