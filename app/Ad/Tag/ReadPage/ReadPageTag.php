<?php

declare(strict_types=1);

namespace App\Ad\Tag\ReadPage;

use App\AbstractBase\AbstractReadPage;

use App\Repository\TagRepository;

class ReadPageTag extends AbstractReadPage
{
    public function __construct(private TagRepository $repository)
    {
    }

    /**
     * @param array<string, mixed> $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    function __invoke(array $data)
    {
        $parameter = self::makePageParameter($data, TagRepository::PageSize);

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