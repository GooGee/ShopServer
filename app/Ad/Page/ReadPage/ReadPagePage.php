<?php

declare(strict_types=1);

namespace App\Ad\Page\ReadPage;

use App\AbstractBase\AbstractReadPage;

use App\Repository\PageRepository;

class ReadPagePage extends AbstractReadPage
{
    public function __construct(private PageRepository $repository)
    {
    }

    /**
     * @param array<string, mixed> $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    function __invoke(array $data)
    {
        $parameter = self::makePageParameter($data, PageRepository::PageSize);

        $qb = $this->repository->query()
            ->whereNull('dtDelete');

        $builder = self::makeReadPageQueryBuilder($qb, $parameter);

        $builder->addFilterzzSearch([

            'title',
            'content',
        ]);
        $builder->addSort();
        return $builder->paginate();
    }

}