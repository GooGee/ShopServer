<?php

declare(strict_types=1);

namespace App\Ad\Admin\ReadPage;

use App\AbstractBase\AbstractReadPage;

use App\Repository\AdminRepository;

class ReadPageAdmin extends AbstractReadPage
{
    public function __construct(private AdminRepository $repository)
    {
    }

    /**
     * @param array<string, mixed> $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    function __invoke(array $data)
    {
        $parameter = self::makePageParameter($data, AdminRepository::PageSize);

        $qb = $this->repository->query();

        $builder = self::makeReadPageQueryBuilder($qb, $parameter);

        $builder->addFilterzzSearch(['name', 'email']);
        $builder->addSort();
        return $builder->paginate();
    }

}