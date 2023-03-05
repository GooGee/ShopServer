<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\Review;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Review|null find(int $id)
 * @method Review findOrFail(int $id)
 */
class ReviewRepository extends AbstractRepository
{

    function query(): Builder
    {
        return Review::query();
    }

}