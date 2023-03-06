<?php

declare(strict_types=1);

namespace App\Ad\Product\ReadMany;


use App\Models\Product;
use App\Repository\ProductRepository;

class ReadManyProduct
{
    public function __construct(private ProductRepository $repository)
    {
    }

    /**
     * @param array<int> $idzz
     * @return \Illuminate\Database\Eloquent\Collection<int, Product>
     */
    function __invoke(array $idzz)
    {
        return $this->repository->query()
            ->whereIn('id', $idzz)
            ->whereNull('dtDelete')
            ->get();
    }

}