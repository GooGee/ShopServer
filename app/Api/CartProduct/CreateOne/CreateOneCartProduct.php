<?php

declare(strict_types=1);

namespace App\Api\CartProduct\CreateOne;

use App\Models\User;

use App\Models\CartProduct;
use App\Repository\CartProductRepository;

class CreateOneCartProduct
{
    public function __construct(private CartProductRepository $repository)
    {
    }

    function __invoke(User $user,

                      int $productSkuId,
                      int $amount,
    )
    {
        $item = new CartProduct();
        $item->userId = $user->id;

        $item->productSkuId = $productSkuId;
        $item->amount = $amount;

        $item->save();
        $item->refresh();

        event(new CreateOneCartProductEvent($user, $item));

        return $item;
    }

}