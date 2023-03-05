<?php

declare(strict_types=1);

namespace App\Ad\FileInfo\ReadPage;

use App\AbstractBase\AbstractController;

use App\Ad\FileInfo\CreateOne\CreateOneFileInfoResponse;
use App\Ad\FileInfo\ReadPage\ReadPageFileInfoRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadPageFileInfoController extends AbstractController
{
    public function __invoke(ReadPageFileInfoRequest $request, ReadPageFileInfo $readPage)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadPageFileInfo')) {
            throw new AccessDeniedHttpException('Permission ReadPageFileInfo required');
        }

        $page = $readPage($request->validated());

        return CreateOneFileInfoResponse::sendPage($page);
    }
}