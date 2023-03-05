<?php

declare(strict_types=1);

namespace App\Ad\ProductVoucher\DeleteOne;

use App\AbstractBase\AbstractController;
use App\AbstractBase\AbstractResponse;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteOneProductVoucherController extends AbstractController
{
    public function __invoke(int $id, DeleteOneProductVoucher $delete)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('DeleteOneProductVoucher')) {
            throw new AccessDeniedHttpException('Permission DeleteOneProductVoucher required');
        }

        $result = $delete->run($user, $id);

        return AbstractResponse::sendOK($result);
    }
}