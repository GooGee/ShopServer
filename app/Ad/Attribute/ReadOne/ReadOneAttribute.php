<?php

declare(strict_types=1);

namespace App\Ad\Attribute\ReadOne;


use App\Repository\AttributeRepository;

class ReadOneAttribute
{
    public function __construct(private AttributeRepository $repository)
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