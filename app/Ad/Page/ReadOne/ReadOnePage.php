<?php

declare(strict_types=1);

namespace App\Ad\Page\ReadOne;


use App\Repository\PageRepository;

class ReadOnePage
{
    public function __construct(private PageRepository $repository)
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