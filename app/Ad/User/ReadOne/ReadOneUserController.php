<?php

declare(strict_types=1);

namespace App\Ad\User\ReadOne;

use App\AbstractBase\AbstractController;

use App\Ad\User\CreateOne\CreateOneUserResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReadOneUserController extends AbstractController
{
    public function __invoke(int $id, ReadOneUser $readOne)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadOneUser')) {
            throw new AccessDeniedHttpException('Permission ReadOneUser required');
        }

        $item = $readOne->findOrFail($id);
        return CreateOneUserResponse::sendItem($item);
    }
}