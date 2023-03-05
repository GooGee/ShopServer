<?php

declare(strict_types=1);

namespace App\Ad\Product\ReadOne;

use App\AbstractBase\AbstractController;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReadOneProductController extends AbstractController
{
    public function __invoke(int $id, ReadOneProduct $readOne)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadOneProduct')) {
            throw new AccessDeniedHttpException('Permission ReadOneProduct required');
        }

        $item = $readOne->findOrFail($id);
        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }

        $item->load(['voucherzz']);
        return ReadOneProductResponse::sendItem($item);
    }
}