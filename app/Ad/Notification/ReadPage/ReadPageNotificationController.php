<?php

declare(strict_types=1);

namespace App\Ad\Notification\ReadPage;

use App\AbstractBase\AbstractController;

use App\Ad\Notification\CreateOne\CreateOneNotificationResponse;
use App\Ad\Notification\ReadPage\ReadPageNotificationRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadPageNotificationController extends AbstractController
{
    public function __invoke(ReadPageNotificationRequest $request, ReadPageNotification $readPage)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadPageNotification')) {
            throw new AccessDeniedHttpException('Permission ReadPageNotification required');
        }

        $page = $readPage($request->validated());

        return CreateOneNotificationResponse::sendPage($page);
    }
}