<?php

declare(strict_types=1);

namespace App\Ad\RoleHasPermission\DeleteOne;

use App\AbstractBase\AbstractController;
use App\AbstractBase\AbstractResponse;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteOneRoleHasPermissionController extends AbstractController
{
    public function __invoke(int $id, DeleteOneRoleHasPermission $delete)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('DeleteOneRoleHasPermission')) {
            throw new AccessDeniedHttpException('Permission DeleteOneRoleHasPermission required');
        }

        $result = $delete($user, $id);

        return AbstractResponse::sendOK($result);
    }
}