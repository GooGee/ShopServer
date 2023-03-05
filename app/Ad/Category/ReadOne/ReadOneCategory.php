<?php

declare(strict_types=1);

namespace App\Ad\Category\ReadOne;


use App\Repository\CategoryRepository;

class ReadOneCategory
{
    public function __construct(private CategoryRepository $repository)
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