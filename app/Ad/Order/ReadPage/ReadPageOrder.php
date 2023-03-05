<?php

declare(strict_types=1);

namespace App\Ad\Order\ReadPage;

use App\AbstractBase\AbstractReadPage;

use App\AbstractBase\ReadPageQueryBuilder;
use App\Repository\OrderRepository;

class ReadPageOrder extends AbstractReadPage
{
    public function __construct(private OrderRepository $repository)
    {
    }

    /**
     * @param array<string, mixed> $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    function __invoke(array $data)
    {
        $parameter = self::makePageParameter($data, OrderRepository::PageSize);

        $qb = $this->repository->query()
            ->whereNull('dtDelete');

        $builder = self::makeReadPageQueryBuilder($qb, $parameter);

        $builder->addDateFilter();
        $builder->addFilterzz(['id', 'status', 'statusPayment']);
        $builder->addSort();
        return $builder->paginate();
    }

}