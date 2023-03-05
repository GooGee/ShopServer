<?php

declare(strict_types=1);

namespace App\Ad\Notification\UpdateOne;

use App\Models\Admin;

use App\Repository\NotificationRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateOneNotification
{
    public function __construct(private NotificationRepository $repository)
    {
    }

    function __invoke(int $id, Admin $user,

                      string $text,)
    {
        $item = $this->repository->findOrFail($id);

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }


        $item->text = $text;

        $item->save();

        event(new UpdateOneNotificationEvent($user, $item));

        return $item;
    }

}