<?php

declare(strict_types=1);

namespace App\Ad\Notification\DeleteOne;

use App\AbstractBase\AbstractController;
use App\AbstractBase\AbstractResponse;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteOneNotificationController extends AbstractController
{
    public function __invoke(int $id, DeleteOneNotification $delete)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('DeleteOneNotification')) {
            throw new AccessDeniedHttpException('Permission DeleteOneNotification required');
        }

        $result = $delete($user, $id);

        return AbstractResponse::sendOK($result);
    }
}