<?php

declare(strict_types=1);

namespace App\Ad\Order\UpdateOne;

use App\AbstractBase\AbstractController;

use App\Ad\Order\CreateOne\CreateOneOrderResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UpdateOneOrderController extends AbstractController
{
    public function __invoke(int $id,
                             UpdateOneOrderRequest $request,
                             UpdateOneOrder        $update,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('UpdateOneOrder')) {
            throw new AccessDeniedHttpException('Permission UpdateOneOrder required');
        }

        $data = $request->validated();
        $item = $update($id,
            $user,

            $request->validated('dtCancel'),
            $request->validated('dtFulfill'),
            $request->validated('dtRefund'),
        );

        return CreateOneOrderResponse::sendItem($item);
    }
}