<?php

declare(strict_types=1);

namespace App\Ad\ProductSku\UpdateOne;

use App\AbstractBase\AbstractController;

use App\Ad\ProductSku\CreateOne\CreateOneProductSkuResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UpdateOneProductSkuController extends AbstractController
{
    public function __invoke(int $id,
                             UpdateOneProductSkuRequest $request,
                             UpdateOneProductSku        $update,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('UpdateOneProductSku')) {
            throw new AccessDeniedHttpException('Permission UpdateOneProductSku required');
        }

        $data = $request->validated();
        $item = $update($id,
            $user,

            $data['price'],
            $data['stock'],
        );

        return CreateOneProductSkuResponse::sendItem($item);
    }
}