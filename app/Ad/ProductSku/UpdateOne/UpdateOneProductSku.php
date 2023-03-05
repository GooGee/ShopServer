<?php

declare(strict_types=1);

namespace App\Ad\ProductSku\UpdateOne;

use App\Models\Admin;

use App\Repository\ProductSkuRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateOneProductSku
{
    public function __construct(private ProductSkuRepository $repository)
    {
    }

    function __invoke(int $id, Admin $user,

                      int $price,
                      int $stock,)
    {
        $item = $this->repository->findOrFail($id);

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }

        if ($stock < 0) {
            throw new BadRequestHttpException('stock is invalie: ' . $stock);
        }

        $item->price = $price;
        $item->stock = $stock;

        $item->save();

        event(new UpdateOneProductSkuEvent($user, $item));

        return $item;
    }

}