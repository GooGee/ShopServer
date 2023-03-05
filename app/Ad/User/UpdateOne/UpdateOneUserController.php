<?php

declare(strict_types=1);

namespace App\Ad\User\UpdateOne;

use App\AbstractBase\AbstractController;

use App\Ad\User\CreateOne\CreateOneUserResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UpdateOneUserController extends AbstractController
{
    public function __invoke(int $id,
                             UpdateOneUserRequest $request,
                             UpdateOneUser        $update,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('UpdateOneUser')) {
            throw new AccessDeniedHttpException('Permission UpdateOneUser required');
        }

        $item = $update($id,
            $user,

        );

        return CreateOneUserResponse::sendItem($item);
    }
}