<?php

declare(strict_types=1);

namespace App\Ad\Product\DeleteOne;

use App\Models\Admin;

use App\Repository\ProductRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteOneProduct
{
    public function __construct(private ProductRepository $repository)
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

        event(new DeleteOneProductEvent($user, $item));

        return $item;
    }
}