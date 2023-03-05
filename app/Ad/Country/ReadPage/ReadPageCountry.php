<?php

declare(strict_types=1);

namespace App\Ad\Country\ReadPage;

use App\AbstractBase\AbstractReadPage;

use App\Repository\CountryRepository;

class ReadPageCountry extends AbstractReadPage
{
    public function __construct(private CountryRepository $repository)
    {
    }

    /**
     * @param array<string, mixed> $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    function __invoke(array $data)
    {
        $parameter = self::makePageParameter($data, CountryRepository::PageSize);

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