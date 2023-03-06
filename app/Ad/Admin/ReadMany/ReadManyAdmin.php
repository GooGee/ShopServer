<?php

declare(strict_types=1);

namespace App\Ad\Admin\ReadMany;


use App\Models\Admin;
use App\Repository\AdminRepository;

class ReadManyAdmin
{
    public function __construct(private AdminRepository $repository)
    {
    }

    /**
     * @param array<int> $idzz
     * @return \Illuminate\Database\Eloquent\Collection<int, Admin>
     */
    function __invoke(array $idzz)
    {
        return $this->repository->query()
            ->whereIn('id', $idzz)
            ->orderByDesc('id')
            ->get();
    }

    function readPage()
    {
        return $this->repository->query()
            ->paginate();
    }

}