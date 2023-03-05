<?php

declare(strict_types=1);

namespace App\Ad\Country\ReadOne;


use App\Repository\CountryRepository;

class ReadOneCountry
{
    public function __construct(private CountryRepository $repository)
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