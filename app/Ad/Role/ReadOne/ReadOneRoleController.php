<?php

declare(strict_types=1);

namespace App\Ad\Role\ReadOne;

use App\AbstractBase\AbstractController;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReadOneRoleController extends AbstractController
{
    public function __invoke(int $id, ReadOneRole $readOne)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadOneRole')) {
            throw new AccessDeniedHttpException('Permission ReadOneRole required');
        }

        $item = $readOne->findOrFail($id);
        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }

        $item->load(['permissionzz']);
        return ReadOneRoleResponse::sendItem($item);
    }
}