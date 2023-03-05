<?php

declare(strict_types=1);

namespace App\Ad\Role\ReadPage;

use App\AbstractBase\AbstractController;

use App\Ad\Role\CreateOne\CreateOneRoleResponse;
use App\Ad\Role\ReadPage\ReadPageRoleRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadPageRoleController extends AbstractController
{
    public function __invoke(ReadPageRoleRequest $request, ReadPageRole $readPage)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadPageRole')) {
            throw new AccessDeniedHttpException('Permission ReadPageRole required');
        }

        $page = $readPage($request->validated());

        return CreateOneRoleResponse::sendPage($page);
    }
}