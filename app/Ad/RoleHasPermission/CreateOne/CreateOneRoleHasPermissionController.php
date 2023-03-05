<?php

declare(strict_types=1);

namespace App\Ad\RoleHasPermission\CreateOne;

use App\AbstractBase\AbstractController;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class CreateOneRoleHasPermissionController extends AbstractController
{
    public function __invoke(CreateOneRoleHasPermissionRequest $request,
                             CreateOneRoleHasPermission $create,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('CreateOneRoleHasPermission')) {
            throw new AccessDeniedHttpException('Permission CreateOneRoleHasPermission required');
        }

        $data = $request->validated();
        $item = $create($user,

            $data['permission_id'],
            $data['role_id'],
        );

        return CreateOneRoleHasPermissionResponse::sendItem($item);
    }
}