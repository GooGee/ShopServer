<?php

declare(strict_types=1);

namespace App\Ad\ProductSku\ReadMany;

use App\AbstractBase\AbstractController;
use App\AbstractBase\ReadManyRequest;

use App\Ad\ProductSku\CreateOne\CreateOneProductSkuResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadManyProductSkuController extends AbstractController
{
    public function __invoke(ReadManyRequest $request, ReadManyProductSku $readMany)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadManyProductSku')) {
            throw new AccessDeniedHttpException('Permission ReadManyProductSku required');
        }

        $itemzz = $readMany($request->input('idzz'))->all();

        return CreateOneProductSkuResponse::sendItemzz($itemzz);
    }
}