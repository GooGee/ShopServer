<?php

declare(strict_types=1);

namespace App\Api\Order\CreateOne;

use App\AbstractBase\AbstractController;


class CreateOneOrderController extends AbstractController
{
    public function __invoke(CreateOneOrderRequest $request,
                             CreateOneOrderService $service,
    )
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $data = $request->validated();
        $item = $service->run($user,

            $data['addressId'],
        );

        return CreateOneOrderResponse::sendItem($item);
    }
}