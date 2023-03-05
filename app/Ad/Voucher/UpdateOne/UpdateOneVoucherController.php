<?php

declare(strict_types=1);

namespace App\Ad\Voucher\UpdateOne;

use App\AbstractBase\AbstractController;

use App\Ad\Voucher\CreateOne\CreateOneVoucherRequest;
use App\Ad\Voucher\CreateOne\CreateOneVoucherResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UpdateOneVoucherController extends AbstractController
{
    public function __invoke(int $id,
                             CreateOneVoucherRequest $request,
                             UpdateOneVoucher        $update,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('UpdateOneVoucher')) {
            throw new AccessDeniedHttpException('Permission UpdateOneVoucher required');
        }

        $item = $update->run($id,
            $user,

            $request->validated('type'),
            $request->validated('amount'),
            $request->validated('limit'),
            $request->validated('code'),
            $request->validated('dtStart'),
            $request->validated('dtEnd'),
            $request->validated('name'),
        );

        return CreateOneVoucherResponse::sendItem($item);
    }
}