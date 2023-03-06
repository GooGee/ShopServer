<?php

declare(strict_types=1);

namespace App\Ad\Address\ReadPage;

use App\AbstractBase\AbstractReadPage;

use App\Models\Address;

class ReadPageAddress extends AbstractReadPage
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
        $parameter = self::makePageParameter($data, Address::PageSize);

        $qb = Address::query()
            ->whereNull('dtDelete');

        $builder = self::makeReadPageQueryBuilder($qb, $parameter);

        $builder->addFilterzz([
            'userId',
            'zip',
        ]);

        $builder->addFilterzzSearch([
            'name',
            'phone',
            'text',
        ]);
        $builder->addSort();
        return $builder->paginate();
    }

}