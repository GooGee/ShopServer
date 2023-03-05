<?php

declare(strict_types=1);

namespace App\Ad\Product\UpdateOne;

use App\Models\Admin;

use App\Repository\ProductRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateOneProduct
{
    public function __construct(private ProductRepository $repository)
    {
    }

    function __invoke(int     $id, Admin $user,

                      string  $name,
                      int     $price,
                      int     $stock,
                      string  $image,
                      array   $imagezz,
                      int     $categoryId,
                      int     $discount,
                      string  $detail,
                      ?string $dtPublish,)
    {
        $item = $this->repository->findOrFail($id);

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }


        $item->name = $name;
        $item->price = $price;
        $item->stock = $stock;
        $item->image = $image;
        $item->imagezz = $imagezz;
        $item->categoryId = $categoryId;
        $item->discount = $discount;
        $item->detail = $detail;
        $item->dtPublish = $dtPublish;

        $item->save();

        event(new UpdateOneProductEvent($user, $item));

        return $item;
    }

    function updateStock(int $id, Admin $user, int $stock,)
    {
        $item = $this->repository->findOrFail($id);

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }

        $item->stock = $stock;
        $item->save();

        event(new UpdateOneProductStockEvent($user, $item));

        return $item;
    }

}