<?php

declare(strict_types=1);

namespace App\Ad\Voucher\ReadPage;

use App\AbstractBase\AbstractController;

use App\Ad\Voucher\CreateOne\CreateOneVoucherResponse;
use App\Ad\Voucher\ReadPage\ReadPageVoucherRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadPageVoucherController extends AbstractController
{
    public function __invoke(ReadPageVoucherRequest $request, ReadPageVoucher $readPage)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadPageVoucher')) {
            throw new AccessDeniedHttpException('Permission ReadPageVoucher required');
        }

        $page = $readPage->run($request->validated());

        return CreateOneVoucherResponse::sendPage($page);
    }
}