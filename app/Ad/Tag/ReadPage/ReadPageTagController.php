<?php

declare(strict_types=1);

namespace App\Ad\Tag\ReadPage;

use App\AbstractBase\AbstractController;

use App\Ad\Tag\CreateOne\CreateOneTagResponse;
use App\Ad\Tag\ReadPage\ReadPageTagRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadPageTagController extends AbstractController
{
    public function __invoke(ReadPageTagRequest $request, ReadPageTag $readPage)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadPageTag')) {
            throw new AccessDeniedHttpException('Permission ReadPageTag required');
        }

        $page = $readPage($request->validated());

        return CreateOneTagResponse::sendPage($page);
    }
}