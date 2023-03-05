<?php

declare(strict_types=1);

namespace App\Ad\Notification\ReadOne;

use App\AbstractBase\AbstractController;

use App\Ad\Notification\CreateOne\CreateOneNotificationResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReadOneNotificationController extends AbstractController
{
    public function __invoke(int $id, ReadOneNotification $readOne)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadOneNotification')) {
            throw new AccessDeniedHttpException('Permission ReadOneNotification required');
        }

        $item = $readOne->findOrFail($id);
        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }
        return CreateOneNotificationResponse::sendItem($item);
    }
}