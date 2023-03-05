<?php

declare(strict_types=1);

namespace App\Ad\Permission\ReadPage;

use App\AbstractBase\AbstractController;

use App\Ad\Permission\CreateOne\CreateOnePermissionResponse;
use App\Ad\Permission\ReadPage\ReadPagePermissionRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadPagePermissionController extends AbstractController
{
    public function __invoke(ReadPagePermissionRequest $request, ReadPagePermission $readPage)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadPagePermission')) {
            throw new AccessDeniedHttpException('Permission ReadPagePermission required');
        }

        $page = $readPage($request->validated());

        return CreateOnePermissionResponse::sendPage($page);
    }
}