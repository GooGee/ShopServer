<?php

declare(strict_types=1);

namespace App\Ad\Address\ReadMany;


use App\Models\Address;
use App\Repository\AddressRepository;

class ReadManyAddress
{
    public function __construct(private AddressRepository $repository)
    {
    }

    /**
     * @param array<int> $idzz
     * @return \Illuminate\Database\Eloquent\Collection<int, Address>
     */
    function __invoke(array $idzz)
    {
        return $this->repository->query()
            ->whereIn('id', $idzz)
            ->whereNull('dtDelete')
            ->get();
    }

}