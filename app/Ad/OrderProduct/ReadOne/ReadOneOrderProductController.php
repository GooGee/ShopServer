<?php

declare(strict_types=1);

namespace App\Ad\OrderProduct\ReadOne;

use App\AbstractBase\AbstractController;

use App\Ad\OrderProduct\CreateOne\CreateOneOrderProductResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReadOneOrderProductController extends AbstractController
{
    public function __invoke(int $id, ReadOneOrderProduct $readOne)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadOneOrderProduct')) {
            throw new AccessDeniedHttpException('Permission ReadOneOrderProduct required');
        }

        $item = $readOne->findOrFail($id);
        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }
        return CreateOneOrderProductResponse::sendItem($item);
    }
}