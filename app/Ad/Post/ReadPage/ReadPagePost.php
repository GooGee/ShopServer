<?php

declare(strict_types=1);

namespace App\Ad\Post\ReadPage;

use App\AbstractBase\AbstractReadPage;

use App\Repository\PostRepository;

class ReadPagePost extends AbstractReadPage
{
    public function __construct(private PostRepository $repository)
    {
    }

    /**
     * @param array<string, mixed> $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    function run(array $data)
    {
        $parameter = self::makePageParameter($data, PostRepository::PageSize);

        $qb = $this->repository->query()
            ->with(['admin', 'user'])
            ->whereNull('dtDelete');

        $builder = self::makeReadPageQueryBuilder($qb, $parameter);

        $builder->addFilterzz([

            'reviewId',
        ]);
        $builder->addSort();
        return $builder->paginate();
    }

}