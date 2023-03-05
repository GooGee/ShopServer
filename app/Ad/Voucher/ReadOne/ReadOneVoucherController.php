<?php

declare(strict_types=1);

namespace App\Ad\Voucher\ReadOne;

use App\AbstractBase\AbstractController;

use App\Ad\Voucher\CreateOne\CreateOneVoucherResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReadOneVoucherController extends AbstractController
{
    public function __invoke(int $id, ReadOneVoucher $readOne)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadOneVoucher')) {
            throw new AccessDeniedHttpException('Permission ReadOneVoucher required');
        }

        $item = $readOne->findOrFail($id);
        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }
        return CreateOneVoucherResponse::sendItem($item);
    }
}