<?php

declare(strict_types=1);

namespace App\Ad\ProductSku\ReadOne;

use App\AbstractBase\AbstractController;

use App\Ad\ProductSku\CreateOne\CreateOneProductSkuResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReadOneProductSkuController extends AbstractController
{
    public function __invoke(int $id, ReadOneProductSku $readOne)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadOneProductSku')) {
            throw new AccessDeniedHttpException('Permission ReadOneProductSku required');
        }

        $item = $readOne->findOrFail($id);
        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }
        return CreateOneProductSkuResponse::sendItem($item);
    }
}