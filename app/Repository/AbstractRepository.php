<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstractRepository
{
    const PageSize = 20;

    abstract function query(): Builder;

    function find(int $id)
    {
        return $this->query()->find($id);
    }

    function findOrFail(int $id)
    {
        return $this->query()->findOrFail($id);
    }

    function queryOf(int $userId, bool $noDeleted = true)
    {
        $qb = $this->query()
            ->where('userId', $userId);
        if ($noDeleted) {
            $qb->whereNull('dtDelete');
        }
        return $qb;
    }

}