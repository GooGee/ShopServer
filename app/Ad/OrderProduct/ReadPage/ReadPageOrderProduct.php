<?php

declare(strict_types=1);

namespace App\Ad\OrderProduct\ReadPage;

use App\AbstractBase\AbstractReadPage;

use App\Repository\OrderProductRepository;

class ReadPageOrderProduct extends AbstractReadPage
{
    public function __construct(private OrderProductRepository $repository)
    {
    }

    /**
     * @param array<string, mixed> $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    function __invoke(array $data)
    {
        $parameter = self::makePageParameter($data, OrderProductRepository::PageSize);

        $qb = $this->repository->query()
            ->with('productSku.product')
            ->where('orderId', $parameter->filter['orderId'])
            ->whereNull('dtDelete');

        if (isset($parameter->sortField)) {
            $qb->orderBy($parameter->sortField, $parameter->sortOrder);
        }
        return $qb->paginate($parameter->perPage, ['*'], 'page', $parameter->page);
    }

}