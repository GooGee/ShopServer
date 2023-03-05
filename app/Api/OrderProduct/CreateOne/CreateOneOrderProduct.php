<?php

declare(strict_types=1);

namespace App\Api\OrderProduct\CreateOne;

use App\Models\User;

use App\Models\OrderProduct;
use App\Repository\OrderProductRepository;

class CreateOneOrderProduct
{
    public function __construct(private OrderProductRepository $repository)
    {
    }

    function __invoke(User $user,

                      int $orderId,
                      int $amount,
                      int $price,
                      int $productSkuId,
    )
    {
        $item = new OrderProduct();

        $item->orderId = $orderId;
        $item->amount = $amount;
        $item->price = $price;
        $item->productSkuId = $productSkuId;

        $item->save();
        $item->refresh();

        event(new CreateOneOrderProductEvent($user, $item));

        return $item;
    }

}