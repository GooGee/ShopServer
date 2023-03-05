<?php

declare(strict_types=1);

namespace App\Api\OrderProduct\ReadOne;


use App\Repository\OrderProductRepository;

class ReadOneOrderProduct
{
    public function __construct(private OrderProductRepository $repository)
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