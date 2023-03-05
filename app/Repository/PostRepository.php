<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\Post;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Post|null find(int $id)
 * @method Post findOrFail(int $id)
 */
class PostRepository extends AbstractRepository
{

    function query(): Builder
    {
        return Post::query();
    }

}