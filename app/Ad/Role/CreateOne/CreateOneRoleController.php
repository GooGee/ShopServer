<?php

declare(strict_types=1);

namespace App\Ad\Role\CreateOne;

use App\AbstractBase\AbstractController;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class CreateOneRoleController extends AbstractController
{
    public function __invoke(CreateOneRoleRequest $request,
                             CreateOneRole $create,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('CreateOneRole')) {
            throw new AccessDeniedHttpException('Permission CreateOneRole required');
        }

        $item = $create($user,

            $request->validated('name'),
        );

        return CreateOneRoleResponse::sendItem($item);
    }
}