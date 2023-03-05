<?php

declare(strict_types=1);

namespace App\Ad\Notification\DeleteOne;

use App\Models\Admin;

use App\Repository\NotificationRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteOneNotification
{
    public function __construct(private NotificationRepository $repository)
    {
    }

    function __invoke(Admin $user, int $id)
    {
        $item = $this->repository->findOrFail($id);

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }

        $item->dtDelete = now();
        $item->save();

        event(new DeleteOneNotificationEvent($user, $item));

        return $item;
    }
}