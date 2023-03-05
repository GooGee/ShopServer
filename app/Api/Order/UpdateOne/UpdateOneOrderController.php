<?php

declare(strict_types=1);

namespace App\Api\Order\UpdateOne;

use App\AbstractBase\AbstractController;

use App\Api\Order\CreateOne\CreateOneOrderResponse;

class UpdateOneOrderController extends AbstractController
{
    public function __invoke(int $id,
                             UpdateOneOrderRequest $request,
                             UpdateOneOrder        $update,
    )
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $data = $request->validated();
        $item = $update($id,
            $user,

            $request->validated('dtCancel'),
            $request->validated('dtReceive'),
            $request->validated('dtReturn'),
        );

        return CreateOneOrderResponse::sendItem($item);
    }
}