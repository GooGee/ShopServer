<?php

declare(strict_types=1);

namespace App\Ad\Page\ReadPage;

use App\AbstractBase\AbstractController;

use App\Ad\Page\CreateOne\CreateOnePageResponse;
use App\Ad\Page\ReadPage\ReadPagePageRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadPagePageController extends AbstractController
{
    public function __invoke(ReadPagePageRequest $request, ReadPagePage $readPage)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadPagePage')) {
            throw new AccessDeniedHttpException('Permission ReadPagePage required');
        }

        $page = $readPage($request->validated());

        return CreateOnePageResponse::sendPage($page);
    }
}