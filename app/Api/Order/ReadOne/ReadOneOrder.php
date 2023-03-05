<?php

declare(strict_types=1);

namespace App\Api\Order\ReadOne;


use App\Repository\OrderRepository;

class ReadOneOrder
{
    public function __construct(private OrderRepository $repository)
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