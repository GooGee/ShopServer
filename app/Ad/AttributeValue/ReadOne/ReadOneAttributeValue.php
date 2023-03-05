<?php

declare(strict_types=1);

namespace App\Ad\AttributeValue\ReadOne;


use App\Repository\AttributeValueRepository;

class ReadOneAttributeValue
{
    public function __construct(private AttributeValueRepository $repository)
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