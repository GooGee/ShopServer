<?php

declare(strict_types=1);

namespace App\Api\Address\ReadOne;


use App\Repository\AddressRepository;

class ReadOneAddress
{
    public function __construct(private AddressRepository $repository)
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