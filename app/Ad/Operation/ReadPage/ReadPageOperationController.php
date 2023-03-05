<?php

declare(strict_types=1);

namespace App\Ad\Operation\ReadPage;

use App\AbstractBase\AbstractController;

use App\Ad\Operation\CreateOne\CreateOneOperationResponse;
use App\Ad\Operation\ReadPage\ReadPageOperationRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadPageOperationController extends AbstractController
{
    public function __invoke(ReadPageOperationRequest $request, ReadPageOperation $readPage)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadPageOperation')) {
            throw new AccessDeniedHttpException('Permission ReadPageOperation required');
        }

        $page = $readPage($request->validated());

        return CreateOneOperationResponse::sendPage($page);
    }
}