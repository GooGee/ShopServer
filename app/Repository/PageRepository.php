<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\Page;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Page|null find(int $id)
 * @method Page findOrFail(int $id)
 */
class PageRepository extends AbstractRepository
{

    function query(): Builder
    {
        return Page::query();
    }

}