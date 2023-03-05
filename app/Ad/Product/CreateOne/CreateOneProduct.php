<?php

declare(strict_types=1);

namespace App\Ad\Product\CreateOne;

use App\Models\Admin;

use App\Models\Product;
use App\Repository\ProductRepository;

class CreateOneProduct
{
    public function __construct(private ProductRepository $repository)
    {
    }

    function __invoke(Admin $user,

                      string $name,
                      int $price,
                      int $stock,
                      string $image,
                      array $imagezz,
                      int $categoryId,
                      int $discount,
                      string $detail,
                      int $shopId,
    )
    {
        $item = new Product();

        $item->name = $name;
        $item->price = $price;
        $item->stock = $stock;
        $item->image = $image;
        $item->imagezz = $imagezz;
        $item->categoryId = $categoryId;
        $item->discount = $discount;
        $item->detail = $detail;
        $item->shopId = $shopId;

        $item->save();
        $item->refresh();

        event(new CreateOneProductEvent($user, $item));

        return $item;
    }

}