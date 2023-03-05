<?php

declare(strict_types=1);

namespace App\Ad\Voucher\ReadMany;

use App\AbstractBase\AbstractController;
use App\AbstractBase\ReadManyRequest;

use App\Ad\Voucher\CreateOne\CreateOneVoucherResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadManyVoucherController extends AbstractController
{
    public function __invoke(ReadManyRequest $request, ReadManyVoucher $readMany)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadManyVoucher')) {
            throw new AccessDeniedHttpException('Permission ReadManyVoucher required');
        }

        $itemzz = $readMany->run($request->input('idzz'))->all();

        return CreateOneVoucherResponse::sendItemzz($itemzz);
    }
}