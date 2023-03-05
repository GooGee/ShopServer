<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\AdminSession;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method AdminSession|null find(int $id)
 * @method AdminSession findOrFail(int $id)
 */
class AdminSessionRepository extends AbstractRepository
{

    function query(): Builder
    {
        return AdminSession::query();
    }

    /**
     * @param int $userId
     * @return AdminSession|null
     */
    function findRecent(int $userId)
    {
        return $this->query()
            ->where('adminId', $userId)
            ->orderByDesc('id')
            ->first();
    }
}