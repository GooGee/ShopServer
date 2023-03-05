<?php

declare(strict_types=1);

namespace App\Ad\Post\ReadPage;

use App\AbstractBase\AbstractController;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadPagePostController extends AbstractController
{
    public function __invoke(ReadPagePostRequest $request, ReadPagePost $readPage)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadPagePost')) {
            throw new AccessDeniedHttpException('Permission ReadPagePost required');
        }

        $page = $readPage->run($request->validated());

        return ReadPagePostResponse::sendPage($page);
    }
}