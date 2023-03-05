<?php

declare(strict_types=1);

namespace App\Ad\Voucher\CreateOne;

use App\AbstractBase\AbstractController;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class CreateOneVoucherController extends AbstractController
{
    public function __invoke(CreateOneVoucherRequest $request,
                             CreateOneVoucher $create,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('CreateOneVoucher')) {
            throw new AccessDeniedHttpException('Permission CreateOneVoucher required');
        }

        $item = $create->run($user,

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