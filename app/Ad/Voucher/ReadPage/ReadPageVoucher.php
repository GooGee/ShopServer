<?php

declare(strict_types=1);

namespace App\Ad\Voucher\ReadPage;

use App\AbstractBase\AbstractReadPage;

use App\Models\Voucher;

class ReadPageVoucher extends AbstractReadPage
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
        $parameter = self::makePageParameter($data, Voucher::PageSize);

        $qb = Voucher::query()
            ->whereNull('dtDelete');

        $builder = self::makeReadPageQueryBuilder($qb, $parameter);

        $builder->addFilterzz([
            'type',
        ]);

        $builder->addFilterzzSearch([
            'name',
            'code',
        ]);
        $builder->addSort();
        return $builder->paginate();
    }

}