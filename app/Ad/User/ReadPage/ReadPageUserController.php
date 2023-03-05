<?php

declare(strict_types=1);

namespace App\Ad\User\ReadPage;

use App\AbstractBase\AbstractController;

use App\Ad\User\CreateOne\CreateOneUserResponse;
use App\Ad\User\ReadPage\ReadPageUserRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadPageUserController extends AbstractController
{
    public function __invoke(ReadPageUserRequest $request, ReadPageUser $readPage)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadPageUser')) {
            throw new AccessDeniedHttpException('Permission ReadPageUser required');
        }

        $page = $readPage($request->validated());

        return CreateOneUserResponse::sendPage($page);
    }
}