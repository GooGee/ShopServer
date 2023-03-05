<?php

declare(strict_types=1);

namespace App\Ad\Tag\ReadOne;


use App\Repository\TagRepository;

class ReadOneTag
{
    public function __construct(private TagRepository $repository)
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