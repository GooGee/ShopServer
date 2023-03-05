<?php

declare(strict_types=1);

namespace App\Api\Address\ReadPage;

use App\Models\User;

use App\Repository\AddressRepository;

class ReadPageAddress
{
    public function __construct(private AddressRepository $repository)
    {
    }

    /**
     * @param User $user
     * @param array<string, mixed> $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    function __invoke(User $user, array $data)
    {
        $perPage = $data['pagination']['perPage'] ?? AddressRepository::PageSize;
        $page = $data['pagination']['page'] ?? 1;

        $qb = $this->repository->query()
            ->where('userId', $user->id)
            ->whereNull('dtDelete');
        if (isset($data['sort']['field'])) {
            $qb->orderBy($data['sort']['field'], $data['sort']['order'] ?? "asc");
        }
        return $qb->paginate($perPage, ['*'], 'page', $page);
    }

}