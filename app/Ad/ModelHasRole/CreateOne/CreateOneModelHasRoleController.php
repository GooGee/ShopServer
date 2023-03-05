<?php

declare(strict_types=1);

namespace App\Ad\ModelHasRole\CreateOne;

use App\AbstractBase\AbstractController;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class CreateOneModelHasRoleController extends AbstractController
{
    public function __invoke(CreateOneModelHasRoleRequest $request,
                             CreateOneModelHasRole $create,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('CreateOneModelHasRole')) {
            throw new AccessDeniedHttpException('Permission CreateOneModelHasRole required');
        }

        $data = $request->validated();
        $item = $create($user,

            $data['role_id'],
            $data['model_id'],
        );

        return CreateOneModelHasRoleResponse::sendItem($item);
    }
}