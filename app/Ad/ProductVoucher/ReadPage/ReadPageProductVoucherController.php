<?php

declare(strict_types=1);

namespace App\Ad\ProductVoucher\ReadPage;

use App\AbstractBase\AbstractController;

use App\Ad\ProductVoucher\CreateOne\CreateOneProductVoucherResponse;
use App\Ad\ProductVoucher\ReadPage\ReadPageProductVoucherRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadPageProductVoucherController extends AbstractController
{
    public function __invoke(ReadPageProductVoucherRequest $request, ReadPageProductVoucher $readPage)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadPageProductVoucher')) {
            throw new AccessDeniedHttpException('Permission ReadPageProductVoucher required');
        }

        $page = $readPage->run($request->validated());

        return CreateOneProductVoucherResponse::sendPage($page);
    }
}