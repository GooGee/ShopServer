<?php

declare(strict_types=1);

namespace App\Api\CartProduct\CreateOne;

use App\AbstractBase\AbstractController;


class CreateOneCartProductController extends AbstractController
{
    public function __invoke(CreateOneCartProductRequest $request,
                             CreateOneCartProduct $create,
    )
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $data = $request->validated();
        $item = $create($user,

            $data['productSkuId'],
            $data['amount'],
        );

        return CreateOneCartProductResponse::sendItem($item);
    }
}