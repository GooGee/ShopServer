<?php

declare(strict_types=1);

namespace App\Ad\Trend\ReadPage;

use App\AbstractBase\AbstractReadPage;

use App\Repository\TrendRepository;

class ReadPageTrend extends AbstractReadPage
{
    public function __construct(private TrendRepository $repository)
    {
    }

    /**
     * @param array<string, mixed> $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    function __invoke(array $data)
    {
        $parameter = self::makePageParameter($data, TrendRepository::PageSize);

        $qb = $this->repository->query()
            ->whereNull('dtDelete');

        $builder = self::makeReadPageQueryBuilder($qb, $parameter);

        $builder->addFilterzzSearch([

            'type',
        ]);
        $builder->addSort();
        return $builder->paginate();
    }

}