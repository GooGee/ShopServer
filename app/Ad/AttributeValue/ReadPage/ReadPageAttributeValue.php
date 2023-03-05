<?php

declare(strict_types=1);

namespace App\Ad\AttributeValue\ReadPage;

use App\AbstractBase\AbstractReadPage;

use App\Repository\AttributeValueRepository;

class ReadPageAttributeValue extends AbstractReadPage
{
    public function __construct(private AttributeValueRepository $repository)
    {
    }

    /**
     * @param array<string, mixed> $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    function __invoke(array $data)
    {
        $parameter = self::makePageParameter($data, AttributeValueRepository::PageSize);

        $qb = $this->repository->query()
            ->whereNull('dtDelete');

        $builder = self::makeReadPageQueryBuilder($qb, $parameter);

        $builder->addFilterzzSearch([

            'attributeId',
            'text',
        ]);
        $builder->addSort();
        return $builder->paginate();
    }

}