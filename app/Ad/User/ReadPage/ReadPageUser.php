<?php

declare(strict_types=1);

namespace App\Ad\User\ReadPage;

use App\AbstractBase\AbstractReadPage;

use App\Repository\UserRepository;

class ReadPageUser extends AbstractReadPage
{
    public function __construct(private UserRepository $repository)
    {
    }

    /**
     * @param array<string, mixed> $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    function __invoke(array $data)
    {
        $parameter = self::makePageParameter($data, UserRepository::PageSize);

        $qb = $this->repository->query();

        $builder = self::makeReadPageQueryBuilder($qb, $parameter);

        $builder->addFilterzzSearch(['name', 'email']);
        $builder->addSort();
        return $builder->paginate();
    }

}