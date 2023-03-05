<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\FileInfo;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method FileInfo|null find(int $id)
 * @method FileInfo findOrFail(int $id)
 */
class FileInfoRepository extends AbstractRepository
{

    function query(): Builder
    {
        return FileInfo::query();
    }

}