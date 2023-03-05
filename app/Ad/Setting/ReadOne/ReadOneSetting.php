<?php

declare(strict_types=1);

namespace App\Ad\Setting\ReadOne;


use App\Repository\SettingRepository;

class ReadOneSetting
{
    public function __construct(private SettingRepository $repository)
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