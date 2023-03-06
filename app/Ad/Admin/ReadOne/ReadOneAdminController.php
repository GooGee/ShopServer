<?php

declare(strict_types=1);

namespace App\Ad\Admin\ReadOne;

use App\AbstractBase\AbstractController;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReadOneAdminController extends AbstractController
{
    public function __invoke(int $id, ReadOneAdmin $readOne)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadOneAdmin')) {
            throw new AccessDeniedHttpException();
        }

        $item = $readOne->findOrFail($id);
        $item->load(['rolezz', 'permissionzz']);
        return ReadOneAdminResponse::sendItem($item);
    }
}