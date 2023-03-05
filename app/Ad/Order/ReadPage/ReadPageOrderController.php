<?php

declare(strict_types=1);

namespace App\Ad\Order\ReadPage;

use App\AbstractBase\AbstractController;

use App\Ad\Order\CreateOne\CreateOneOrderResponse;
use App\Ad\Order\ReadPage\ReadPageOrderRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadPageOrderController extends AbstractController
{
    public function __invoke(ReadPageOrderRequest $request, ReadPageOrder $readPage)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadPageOrder')) {
            throw new AccessDeniedHttpException('Permission ReadPageOrder required');
        }

        $page = $readPage($request->validated());

        return CreateOneOrderResponse::sendPage($page);
    }
}