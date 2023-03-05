<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\Setting;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Setting|null find(int $id)
 * @method Setting findOrFail(int $id)
 */
class SettingRepository extends AbstractRepository
{

    function query(): Builder
    {
        return Setting::query();
    }

}