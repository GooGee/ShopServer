<?php

declare(strict_types=1);

namespace App\Ad\OrderProduct\ReadMany;


use App\Models\OrderProduct;
use App\Repository\OrderProductRepository;

class ReadManyOrderProduct
{
    public function __construct(private OrderProductRepository $repository)
    {
    }

    /**
     * @param array<int> $idzz
     * @return \Illuminate\Database\Eloquent\Collection<int, OrderProduct>
     */
    function __invoke(array $idzz)
    {
        return $this->repository->query()
            ->whereIn('id', $idzz)
            ->whereNull('dtDelete')
            ->get();
    }

}