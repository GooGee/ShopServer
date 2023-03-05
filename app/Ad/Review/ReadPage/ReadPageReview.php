<?php

declare(strict_types=1);

namespace App\Ad\Review\ReadPage;

use App\AbstractBase\AbstractReadPage;

use App\Repository\ReviewRepository;

class ReadPageReview extends AbstractReadPage
{
    public function __construct(private ReviewRepository $repository)
    {
    }

    /**
     * @param array<string, mixed> $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    function __invoke(array $data)
    {
        $parameter = self::makePageParameter($data, ReviewRepository::PageSize);

        $qb = $this->repository->query()
            ->whereNull('dtDelete');

        $builder = self::makeReadPageQueryBuilder($qb, $parameter);

        $builder->addFilterzz([

            'rating',
        ]);
        $builder->addSort();
        return $builder->paginate();
    }

}