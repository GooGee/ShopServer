<?php

declare(strict_types=1);

namespace App\Ad\ModelHasPermission\CreateOne;

use App\AbstractBase\AbstractController;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class CreateOneModelHasPermissionController extends AbstractController
{
    public function __invoke(CreateOneModelHasPermissionRequest $request,
                             CreateOneModelHasPermission $create,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('CreateOneModelHasPermission')) {
            throw new AccessDeniedHttpException('Permission CreateOneModelHasPermission required');
        }

        $data = $request->validated();
        $item = $create($user,

            $data['permission_id'],
            $data['model_id'],
        );

        return CreateOneModelHasPermissionResponse::sendItem($item);
    }
}