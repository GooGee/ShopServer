<?php

declare(strict_types=1);

namespace App\Ad\ProductVoucher\CreateOne;

use App\AbstractBase\AbstractController;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class CreateOneProductVoucherController extends AbstractController
{
    public function __invoke(CreateOneProductVoucherRequest $request,
                             CreateOneProductVoucher $create,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('CreateOneProductVoucher')) {
            throw new AccessDeniedHttpException('Permission CreateOneProductVoucher required');
        }

        $item = $create->run($user,

            $request->validated('productId'),
            $request->validated('voucherId'),
        );

        return CreateOneProductVoucherResponse::sendItem($item);
    }
}