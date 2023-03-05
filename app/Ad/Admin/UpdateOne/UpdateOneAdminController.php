<?php

declare(strict_types=1);

namespace App\Ad\Admin\UpdateOne;

use App\AbstractBase\AbstractController;

use App\Ad\Admin\CreateOne\CreateOneAdminResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UpdateOneAdminController extends AbstractController
{
    public function __invoke(int $id,
                             UpdateOneAdminRequest $request,
                             UpdateOneAdmin        $update,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('UpdateOneAdmin')) {
            throw new AccessDeniedHttpException('Permission UpdateOneAdmin required');
        }

        $item = $update($id,
            $user,

            $request->validated('password'),
        );

        return CreateOneAdminResponse::sendItem($item);
    }
}