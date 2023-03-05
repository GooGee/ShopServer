<?php

declare(strict_types=1);

namespace App\Ad\Notification\UpdateOne;

use App\AbstractBase\AbstractController;

use App\Ad\Notification\CreateOne\CreateOneNotificationResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UpdateOneNotificationController extends AbstractController
{
    public function __invoke(int $id,
                             UpdateOneNotificationRequest $request,
                             UpdateOneNotification        $update,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('UpdateOneNotification')) {
            throw new AccessDeniedHttpException('Permission UpdateOneNotification required');
        }

        $item = $update($id,
            $user,

            $request->validated('text'),
        );

        return CreateOneNotificationResponse::sendItem($item);
    }
}