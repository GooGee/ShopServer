<?php

declare(strict_types=1);

namespace App\Api\Address\ReadMany;

use App\Models\User;

use App\Models\Address;
use App\Repository\AddressRepository;

class ReadManyAddress
{
    public function __construct(private AddressRepository $repository)
    {
    }

    /**
     * @param User $user
     * @param array<int> $idzz
     * @return \Illuminate\Database\Eloquent\Collection<int, Address>
     */
    function __invoke(User $user, array $idzz)
    {
        return $this->repository->query()
            ->where('userId', $user->id)
            ->whereIn('id', $idzz)
            ->whereNull('dtDelete')
            ->get();
    }

}