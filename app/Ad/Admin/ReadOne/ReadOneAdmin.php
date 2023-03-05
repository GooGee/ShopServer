<?php

declare(strict_types=1);

namespace App\Ad\Admin\ReadOne;


use App\Repository\AdminRepository;

class ReadOneAdmin
{
    public function __construct(private AdminRepository $repository)
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