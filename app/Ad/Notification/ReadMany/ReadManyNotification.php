<?php

declare(strict_types=1);

namespace App\Ad\Notification\ReadMany;


use App\Models\Notification;
use App\Repository\NotificationRepository;

class ReadManyNotification
{
    public function __construct(private NotificationRepository $repository)
    {
    }

    /**
     * @param array<int> $idzz
     * @return \Illuminate\Database\Eloquent\Collection<int, Notification>
     */
    function __invoke(array $idzz)
    {
        return $this->repository->query()
            ->whereIn('id', $idzz)
            ->whereNull('dtDelete')
            ->get();
    }

}