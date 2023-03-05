<?php

declare(strict_types=1);

namespace App\Ad\Category\ReadOne;

use App\AbstractBase\AbstractController;

use App\Ad\Category\CreateOne\CreateOneCategoryResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReadOneCategoryController extends AbstractController
{
    public function __invoke(int $id, ReadOneCategory $readOne)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadOneCategory')) {
            throw new AccessDeniedHttpException('Permission ReadOneCategory required');
        }

        $item = $readOne->findOrFail($id);
        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }
        return CreateOneCategoryResponse::sendItem($item);
    }
}