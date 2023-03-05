<?php

declare(strict_types=1);

namespace App\Ad\ProductSku\CreateOne;

use App\Models\Admin;

use App\Models\ProductSku;
use App\Repository\ProductSkuRepository;

class CreateOneProductSku
{
    public function __construct(private ProductSkuRepository $repository)
    {
    }

    function __invoke(Admin $user,

                      int $productId,
                      int $price,
                      int $stock,
                      array $variationzz,
    )
    {
        $item = new ProductSku();

        $item->productId = $productId;
        $item->price = $price;
        $item->stock = $stock;
        $item->variationzz = $variationzz;

        $item->save();
        $item->refresh();

        event(new CreateOneProductSkuEvent($user, $item));

        return $item;
    }

}