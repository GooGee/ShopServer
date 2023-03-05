<?php

declare(strict_types=1);

namespace App\Ad\ProductSku\ReadOne;


use App\Repository\ProductSkuRepository;

class ReadOneProductSku
{
    public function __construct(private ProductSkuRepository $repository)
    {
    }

    function find(int $id)
    {
        return $this->repository->find($id);
    }

    function findOrFail(int $id)
    {
        return $this->repository->findOrFail($id);
    }

}