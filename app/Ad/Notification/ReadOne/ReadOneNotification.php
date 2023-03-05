<?php

declare(strict_types=1);

namespace App\Ad\Notification\ReadOne;


use App\Repository\NotificationRepository;

class ReadOneNotification
{
    public function __construct(private NotificationRepository $repository)
    {
    }

    function find(int $id)
    {
        return $this->repository->find($id);
    }

    function findOrFail(int $id)
    {
        return $this->repository->findOrFail($id);
    }

}