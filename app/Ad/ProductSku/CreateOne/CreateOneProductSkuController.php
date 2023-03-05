<?php

declare(strict_types=1);

namespace App\Ad\ProductSku\CreateOne;

use App\AbstractBase\AbstractController;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class CreateOneProductSkuController extends AbstractController
{
    public function __invoke(CreateOneProductSkuRequest $request,
                             CreateOneProductSku $create,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('CreateOneProductSku')) {
            throw new AccessDeniedHttpException('Permission CreateOneProductSku required');
        }

        $data = $request->validated();
        $item = $create($user,

            $data['productId'],
            $data['price'],
            $data['stock'],
            $data['variationzz'],
        );

        return CreateOneProductSkuResponse::sendItem($item);
    }
}