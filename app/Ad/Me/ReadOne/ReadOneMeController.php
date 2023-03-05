<?php

declare(strict_types=1);

namespace App\Ad\Me\ReadOne;

use App\AbstractBase\AbstractController;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReadOneMeController extends AbstractController
{
    public function __invoke()
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->dtDelete) {
            throw new NotFoundHttpException();
        }

        $user->permissionzz = $user->getAllPermissions();
        return ReadOneMeResponse::sendItem($user);
    }
}