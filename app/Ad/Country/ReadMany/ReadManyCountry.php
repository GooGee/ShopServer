<?php

declare(strict_types=1);

namespace App\Ad\Country\ReadMany;


use App\Models\Country;
use App\Repository\CountryRepository;

class ReadManyCountry
{
    public function __construct(private CountryRepository $repository)
    {
    }

    /**
     * @param array<int> $idzz
     * @return \Illuminate\Database\Eloquent\Collection<int, Country>
     */
    function __invoke(array $idzz)
    {
        return $this->repository->query()
            ->whereIn('id', $idzz)
            ->whereNull('dtDelete')
            ->get();
    }

}