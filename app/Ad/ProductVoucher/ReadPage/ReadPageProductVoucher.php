<?php

declare(strict_types=1);

namespace App\Ad\ProductVoucher\ReadPage;

use App\AbstractBase\AbstractReadPage;

use App\Models\ProductVoucher;

class ReadPageProductVoucher extends AbstractReadPage
{
    public function __construct()
    {
    }

    /**
     * @param array<string, mixed> $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    function run(array $data)
    {
        $parameter = self::makePageParameter($data, ProductVoucher::PageSize);

        $qb = ProductVoucher::query()
            ->whereNull('dtDelete');

        $builder = self::makeReadPageQueryBuilder($qb, $parameter);

        $builder->addFilterzz([

            'productId',
            'voucherId',
        ]);
        $builder->addSort();
        return $builder->paginate();
    }

}