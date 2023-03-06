<?php

declare(strict_types=1);

namespace App\Ad\ProductSku\ReadMany;


use App\Models\ProductSku;
use App\Repository\ProductSkuRepository;

class ReadManyProductSku
{
    public function __construct(private ProductSkuRepository $repository)
    {
    }

    /**
     * @param array<int> $idzz
     * @return \Illuminate\Database\Eloquent\Collection<int, ProductSku>
     */
    function __invoke(array $idzz)
    {
        return $this->repository->query()
            ->whereIn('id', $idzz)
            ->whereNull('dtDelete')
            ->get();
    }

}