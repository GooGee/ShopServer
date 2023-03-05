<?php

declare(strict_types=1);

namespace App\Ad\Category\ReadPage;

use App\AbstractBase\AbstractReadPage;

use App\Repository\CategoryRepository;

class ReadPageCategory extends AbstractReadPage
{
    public function __construct(private CategoryRepository $repository)
    {
    }

    /**
     * @param array<string, mixed> $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    function __invoke(array $data)
    {
        $parameter = self::makePageParameter($data, CategoryRepository::PageSize);

        $qb = $this->repository->query()
            ->whereNull('dtDelete');

        $builder = self::makeReadPageQueryBuilder($qb, $parameter);

        if (isset($parameter->filter['name'])) {
            $builder->addFilterzzSearch(['name']);
        } else {
            $builder->addFilterzz(['parentId']);
        }
        $builder->addSort();
        return $builder->paginate();
    }

}