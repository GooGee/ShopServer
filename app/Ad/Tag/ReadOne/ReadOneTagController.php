<?php

declare(strict_types=1);

namespace App\Ad\Tag\ReadOne;

use App\AbstractBase\AbstractController;

use App\Ad\Tag\CreateOne\CreateOneTagResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReadOneTagController extends AbstractController
{
    public function __invoke(int $id, ReadOneTag $readOne)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadOneTag')) {
            throw new AccessDeniedHttpException('Permission ReadOneTag required');
        }

        $item = $readOne->findOrFail($id);
        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }
        return CreateOneTagResponse::sendItem($item);
    }
}