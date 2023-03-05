<?php

declare(strict_types=1);

namespace App\Api\CartProduct\ReadOne;


use App\Repository\CartProductRepository;

class ReadOneCartProduct
{
    public function __construct(private CartProductRepository $repository)
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