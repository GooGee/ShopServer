<?php

declare(strict_types=1);

namespace App\Ad\ProductSku\ReadPage;

use App\AbstractBase\AbstractController;

use App\Ad\ProductSku\CreateOne\CreateOneProductSkuResponse;
use App\Ad\ProductSku\ReadPage\ReadPageProductSkuRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadPageProductSkuController extends AbstractController
{
    public function __invoke(ReadPageProductSkuRequest $request, ReadPageProductSku $readPage)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadPageProductSku')) {
            throw new AccessDeniedHttpException('Permission ReadPageProductSku required');
        }

        $page = $readPage($request->validated());

        return CreateOneProductSkuResponse::sendPage($page);
    }
}