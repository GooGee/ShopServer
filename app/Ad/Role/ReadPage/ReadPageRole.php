<?php

declare(strict_types=1);

namespace App\Ad\Role\ReadPage;

use App\AbstractBase\AbstractReadPage;

use App\Repository\RoleRepository;

class ReadPageRole extends AbstractReadPage
{
    public function __construct(private RoleRepository $repository)
    {
    }

    /**
     * @param array<string, mixed> $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    function __invoke(array $data)
    {
        $parameter = self::makePageParameter($data, RoleRepository::PageSize);

        $qb = $this->repository->query()
            ->whereNull('dtDelete');

        $builder = self::makeReadPageQueryBuilder($qb, $parameter);

        $builder->addFilterzzSearch([

            'name',
        ]);
        $builder->addSort();
        return $builder->paginate();
    }

}