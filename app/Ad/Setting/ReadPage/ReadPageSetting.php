<?php

declare(strict_types=1);

namespace App\Ad\Setting\ReadPage;

use App\AbstractBase\AbstractReadPage;

use App\Repository\SettingRepository;

class ReadPageSetting extends AbstractReadPage
{
    public function __construct(private SettingRepository $repository)
    {
    }

    /**
     * @param array<string, mixed> $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    function __invoke(array $data)
    {
        $parameter = self::makePageParameter($data, SettingRepository::PageSize);

        $qb = $this->repository->query()
            ->whereNull('dtDelete');

        $builder = self::makeReadPageQueryBuilder($qb, $parameter);

        $builder->addFilterzzSearch([

        ]);
        $builder->addSort();
        return $builder->paginate();
    }

}