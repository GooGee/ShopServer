<?php

declare(strict_types=1);

namespace App\Ad\FileInfo\ReadOne;


use App\Repository\FileInfoRepository;

class ReadOneFileInfo
{
    public function __construct(private FileInfoRepository $repository)
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