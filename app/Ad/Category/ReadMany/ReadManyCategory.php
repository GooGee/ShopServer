<?php

declare(strict_types=1);

namespace App\Ad\Category\ReadMany;


use App\Models\Category;
use App\Repository\CategoryRepository;

class ReadManyCategory
{
    public function __construct(private CategoryRepository $repository)
    {
    }

    /**
     * @param array<int> $idzz
     * @return \Illuminate\Database\Eloquent\Collection<int, Category>
     */
    function __invoke(array $idzz)
    {
        return $this->repository->query()
            ->whereIn('id', $idzz)
            ->whereNull('dtDelete')
            ->get();
    }

}