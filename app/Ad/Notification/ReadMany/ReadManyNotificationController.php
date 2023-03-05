<?php

declare(strict_types=1);

namespace App\Ad\Notification\ReadMany;

use App\AbstractBase\AbstractController;
use App\AbstractBase\ReadManyRequest;

use App\Ad\Notification\CreateOne\CreateOneNotificationResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadManyNotificationController extends AbstractController
{
    public function __invoke(ReadManyRequest $request, ReadManyNotification $readMany)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadManyNotification')) {
            throw new AccessDeniedHttpException('Permission ReadManyNotification required');
        }

        $itemzz = $readMany($request->input('idzz'))->all();

        return CreateOneNotificationResponse::sendItemzz($itemzz);
    }
}