<?php

declare(strict_types=1);

namespace App\Ad\ProductSku\UpdateOne;

use App\Ad\Product\UpdateOne\UpdateOneProduct;
use App\Repository\ProductSkuRepository;

class SetProductStockListener
{
    public function __construct(private ProductSkuRepository $productSkuRepository,
                                private UpdateOneProduct       $updateOneProduct)
    {
    }

    function handle(UpdateOneProductSkuEvent $event)
    {
        $amount = $this->productSkuRepository->query()
            ->where('productId', $event->item->productId)
            ->sum('stock');
        $this->updateOneProduct->updateStock($event->item->productId, $event->user, intval($amount));
    }
}