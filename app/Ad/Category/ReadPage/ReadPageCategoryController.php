<?php

declare(strict_types=1);

namespace App\Ad\Category\ReadPage;

use App\AbstractBase\AbstractController;

use App\Ad\Category\CreateOne\CreateOneCategoryResponse;
use App\Ad\Category\ReadPage\ReadPageCategoryRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadPageCategoryController extends AbstractController
{
    public function __invoke(ReadPageCategoryRequest $request, ReadPageCategory $readPage)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadPageCategory')) {
            throw new AccessDeniedHttpException('Permission ReadPageCategory required');
        }

        $page = $readPage($request->validated());

        return CreateOneCategoryResponse::sendPage($page);
    }
}