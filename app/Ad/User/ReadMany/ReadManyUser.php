<?php

declare(strict_types=1);

namespace App\Ad\User\ReadMany;


use App\Models\User;
use App\Repository\UserRepository;

class ReadManyUser
{
    public function __construct(private UserRepository $repository)
    {
    }

    /**
     * @param array<int> $idzz
     * @return \Illuminate\Database\Eloquent\Collection<int, User>
     */
    function __invoke(array $idzz)
    {
        return $this->repository->query()
            ->whereIn('id', $idzz)
            ->get();
    }

}