<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Category|null find(int $id)
 * @method Category findOrFail(int $id)
 */
class CategoryRepository extends AbstractRepository
{

    function query(): Builder
    {
        return Category::query();
    }

    function getAllChild()
    {
        return $this->query()
            ->where('parentId', '>', Category::RootId)
            ->orderBy('id')
            ->get();
    }

    function getAllParent()
    {
        return $this->query()
            ->where('parentId', Category::RootId)
            ->orderBy('id')
            ->get();
    }

    function getIdParentIdMap()
    {
        return $this->query()
            ->select(['id', 'parentId'])
            ->get()
            ->pluck('parentId', 'id');
    }
}