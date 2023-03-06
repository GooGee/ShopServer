<?php

declare(strict_types=1);

namespace App\Ad\Tag\ReadMany;


use App\Models\Tag;
use App\Repository\TagRepository;

class ReadManyTag
{
    public function __construct(private TagRepository $repository)
    {
    }

    /**
     * @param array<int> $idzz
     * @return \Illuminate\Database\Eloquent\Collection<int, Tag>
     */
    function __invoke(array $idzz)
    {
        return $this->repository->query()
            ->whereIn('id', $idzz)
            ->whereNull('dtDelete')
            ->get();
    }

}