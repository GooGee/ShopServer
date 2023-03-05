<?php

declare(strict_types=1);

namespace App\Ad\Role\UpdateOne;

use App\AbstractBase\AbstractController;

use App\Ad\Role\CreateOne\CreateOneRoleResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UpdateOneRoleController extends AbstractController
{
    public function __invoke(int $id,
                             UpdateOneRoleRequest $request,
                             UpdateOneRole        $update,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('UpdateOneRole')) {
            throw new AccessDeniedHttpException('Permission UpdateOneRole required');
        }

        $data = $request->validated();
        $item = $update($id,
            $user,

            $data['name'],
        );

        return CreateOneRoleResponse::sendItem($item);
    }
}