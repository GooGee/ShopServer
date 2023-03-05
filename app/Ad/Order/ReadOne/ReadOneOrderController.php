<?php

declare(strict_types=1);

namespace App\Ad\Order\ReadOne;

use App\AbstractBase\AbstractController;

use App\Ad\Order\CreateOne\CreateOneOrderResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReadOneOrderController extends AbstractController
{
    public function __invoke(int $id, ReadOneOrder $readOne)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadOneOrder')) {
            throw new AccessDeniedHttpException('Permission ReadOneOrder required');
        }

        $item = $readOne->findOrFail($id);
        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }
        return CreateOneOrderResponse::sendItem($item);
    }
}