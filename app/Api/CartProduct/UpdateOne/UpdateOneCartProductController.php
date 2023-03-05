<?php

declare(strict_types=1);

namespace App\Api\CartProduct\UpdateOne;

use App\AbstractBase\AbstractController;

use App\Api\CartProduct\CreateOne\CreateOneCartProductResponse;

class UpdateOneCartProductController extends AbstractController
{
    public function __invoke(int $id,
                             UpdateOneCartProductRequest $request,
                             UpdateOneCartProduct        $update,
    )
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $data = $request->validated();
        $item = $update($id,
            $user,

            $data['amount'],
        );

        return CreateOneCartProductResponse::sendItem($item);
    }
}