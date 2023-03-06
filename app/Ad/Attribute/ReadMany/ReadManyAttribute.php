<?php

declare(strict_types=1);

namespace App\Ad\Attribute\ReadMany;


use App\Models\Attribute;
use App\Repository\AttributeRepository;

class ReadManyAttribute
{
    public function __construct(private AttributeRepository $repository)
    {
    }

    /**
     * @param array<int> $idzz
     * @return \Illuminate\Database\Eloquent\Collection<int, Attribute>
     */
    function __invoke(array $idzz)
    {
        return $this->repository->query()
            ->whereIn('id', $idzz)
            ->whereNull('dtDelete')
            ->get();
    }

}