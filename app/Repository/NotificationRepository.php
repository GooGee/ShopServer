<?php

declare(strict_types=1);

namespace App\Repository;


use App\Models\Notification;
use Illuminate\Database\Eloquent\Builder;

/**
 * @method Notification|null find(int $id)
 * @method Notification findOrFail(int $id)
 */
class NotificationRepository extends AbstractRepository
{

    function query(): Builder
    {
        return Notification::query();
    }

}