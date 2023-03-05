<?php

declare(strict_types=1);

namespace App\Ad\Role\ReadOne;


use App\Repository\RoleRepository;

class ReadOneRole
{
    public function __construct(private RoleRepository $repository)
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