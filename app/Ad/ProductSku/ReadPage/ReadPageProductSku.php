<?php

declare(strict_types=1);

namespace App\Ad\ProductSku\ReadPage;

use App\AbstractBase\AbstractReadPage;

use App\Repository\ProductSkuRepository;

class ReadPageProductSku extends AbstractReadPage
{
    public function __construct(private ProductSkuRepository $repository)
    {
    }

    /**
     * @param array<string, mixed> $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    function __invoke(array $data)
    {
        $qb = $this->repository->query()
            ->whereNull('dtDelete');

        $parameter = self::makePageParameter($data, ProductSkuRepository::PageSize);
        if (isset($parameter->sortField)) {
            $qb->orderBy($parameter->sortField, $parameter->sortOrder);
        }
        return $qb->paginate($parameter->perPage, ['*'], 'page', $parameter->page);
    }

}