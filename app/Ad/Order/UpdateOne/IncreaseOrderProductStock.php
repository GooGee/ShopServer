<?php

declare(strict_types=1);

namespace App\Ad\Order\UpdateOne;

use App\Ad\ProductSku\UpdateOne\UpdateOneProductSku;
use App\Models\Admin;
use App\Models\Order;
use App\Models\OrderProduct;

class IncreaseOrderProductStock
{
    public function __construct(private UpdateOneProductSku $updateOneProductSku,)
    {
    }

    function run(Admin $user, Order $order)
    {
        /** @var OrderProduct[] $opzz */
        $opzz = $order->orderProductzz()->with('productSku')->get();
        foreach ($opzz as $op) {
            $this->updateOneProductSku->__invoke(
                $op->productSkuId,
                $user,
                $op->productSku->price,
                $op->productSku->stock + $op->amount
            );
        }
    }
}