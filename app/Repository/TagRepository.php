<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Tag|null find(int $id)
 * @method Tag findOrFail(int $id)
 */
class TagRepository extends AbstractRepository
{

    function query(): Builder
    {
        return Tag::query();
    }

}