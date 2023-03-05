<?php

declare(strict_types=1);

namespace App\Ad\Admin\ReadPage;

use App\AbstractBase\AbstractController;

use App\Ad\Admin\CreateOne\CreateOneAdminResponse;
use App\Ad\Admin\ReadPage\ReadPageAdminRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadPageAdminController extends AbstractController
{
    public function __invoke(ReadPageAdminRequest $request, ReadPageAdmin $readPage)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadPageAdmin')) {
            throw new AccessDeniedHttpException('Permission ReadPageAdmin required');
        }

        $page = $readPage($request->validated());

        return CreateOneAdminResponse::sendPage($page);
    }
}