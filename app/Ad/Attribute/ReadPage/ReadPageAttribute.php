<?php

declare(strict_types=1);

namespace App\Ad\Attribute\ReadPage;

use App\AbstractBase\AbstractReadPage;

use App\Repository\AttributeRepository;

class ReadPageAttribute extends AbstractReadPage
{
    public function __construct(private AttributeRepository $repository)
    {
    }

    /**
     * @param array<string, mixed> $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    function __invoke(array $data)
    {
        $parameter = self::makePageParameter($data, AttributeRepository::PageSize);

        $qb = $this->repository->query()
            ->whereNull('dtDelete');

        $builder = self::makeReadPageQueryBuilder($qb, $parameter);

        $builder->addFilterzzSearch([

            'name',
            'categoryId',
        ]);
        $builder->addSort();
        return $builder->paginate();
    }

}