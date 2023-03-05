<?php

declare(strict_types=1);

namespace App\Ad\User\ReadOne;


use App\Repository\UserRepository;

class ReadOneUser
{
    public function __construct(private UserRepository $repository)
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