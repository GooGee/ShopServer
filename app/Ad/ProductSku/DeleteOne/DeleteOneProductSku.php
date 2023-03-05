<?php

declare(strict_types=1);

namespace App\Ad\ProductSku\DeleteOne;

use App\Models\Admin;

use App\Repository\ProductSkuRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteOneProductSku
{
    public function __construct(private ProductSkuRepository $repository)
    {
    }

    function __invoke(Admin $user, int $id)
    {
        $item = $this->repository->findOrFail($id);

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }

        $item->dtDelete = now();
        $item->save();

        event(new DeleteOneProductSkuEvent($user, $item));

        return $item;
    }
}