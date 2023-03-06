<?php

declare(strict_types=1);

namespace App\Api\OrderProduct\ReadMany;

use App\Models\User;

use App\Models\OrderProduct;
use App\Repository\OrderProductRepository;

class ReadManyOrderProduct
{
    public function __construct(private OrderProductRepository $repository)
    {
    }

    /**
     * @param User $user
     * @param array<int> $idzz
     * @return \Illuminate\Database\Eloquent\Collection<int, OrderProduct>
     */
    function __invoke(User $user, array $idzz)
    {
        return $this->repository->query()
            ->where('userId', $user->id)
            ->whereIn('id', $idzz)
            ->whereNull('dtDelete')
            ->get();
    }

    function whereEqual(User $user, string $column, float|int|string $value)
    {
        return $this->repository->query()
            ->where($column, $value)
            ->whereNull('dtDelete')
            ->get();
    }
}