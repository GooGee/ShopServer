<?php

declare(strict_types=1);

namespace App\Ad\Page\ReadMany;


use App\Models\Page;
use App\Repository\PageRepository;

class ReadManyPage
{
    public function __construct(private PageRepository $repository)
    {
    }

    /**
     * @param array<int> $idzz
     * @return \Illuminate\Database\Eloquent\Collection<int, Page>
     */
    function __invoke(array $idzz)
    {
        return $this->repository->query()
            ->whereIn('id', $idzz)
            ->whereNull('dtDelete')
            ->get();
    }

}