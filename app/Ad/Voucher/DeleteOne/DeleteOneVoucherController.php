<?php

declare(strict_types=1);

namespace App\Ad\Voucher\DeleteOne;

use App\AbstractBase\AbstractController;
use App\AbstractBase\AbstractResponse;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteOneVoucherController extends AbstractController
{
    public function __invoke(int $id, DeleteOneVoucher $delete)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('DeleteOneVoucher')) {
            throw new AccessDeniedHttpException('Permission DeleteOneVoucher required');
        }

        $result = $delete->run($user, $id);

        return AbstractResponse::sendOK($result);
    }
}