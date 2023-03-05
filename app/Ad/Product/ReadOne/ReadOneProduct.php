<?php

declare(strict_types=1);

namespace App\Ad\Product\ReadOne;


use App\Repository\ProductRepository;

class ReadOneProduct
{
    public function __construct(private ProductRepository $repository)
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