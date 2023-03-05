<?php

declare(strict_types=1);

namespace App\Ad\Notification\ReadPage;

use App\AbstractBase\AbstractReadPage;

use App\Repository\NotificationRepository;

class ReadPageNotification extends AbstractReadPage
{
    public function __construct(private NotificationRepository $repository)
    {
    }

    /**
     * @param array<string, mixed> $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    function __invoke(array $data)
    {
        $parameter = self::makePageParameter($data, NotificationRepository::PageSize);

        $qb = $this->repository->query()
            ->whereNull('dtDelete');

        $builder = self::makeReadPageQueryBuilder($qb, $parameter);

        $builder->addFilterzzSearch([

            'text',
        ]);
        $builder->addSort();
        return $builder->paginate();
    }

}