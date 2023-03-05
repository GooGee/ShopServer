<?php

declare(strict_types=1);

namespace App\Ad\Notification\CreateOne;

use App\AbstractBase\AbstractController;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class CreateOneNotificationController extends AbstractController
{
    public function __invoke(CreateOneNotificationRequest $request,
                             CreateOneNotification $create,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('CreateOneNotification')) {
            throw new AccessDeniedHttpException('Permission CreateOneNotification required');
        }

        $item = $create($user,

            $request->validated('text'),
        );

        return CreateOneNotificationResponse::sendItem($item);
    }
}