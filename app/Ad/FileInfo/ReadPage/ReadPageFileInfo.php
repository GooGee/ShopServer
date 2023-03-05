<?php

declare(strict_types=1);

namespace App\Ad\FileInfo\ReadPage;

use App\AbstractBase\AbstractReadPage;

use App\Repository\FileInfoRepository;

class ReadPageFileInfo extends AbstractReadPage
{
    public function __construct(private FileInfoRepository $repository)
    {
    }

    /**
     * @param array<string, mixed> $data
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    function __invoke(array $data)
    {
        $parameter = self::makePageParameter($data, FileInfoRepository::PageSize);

        $qb = $this->repository->query()
            ->whereNull('dtDelete');

        $parameter = self::makePageParameter($data, FileInfoRepository::PageSize);
        $mime = $parameter->filter['mime'] ?? null;
        if (isset($mime)) {
            $qb->where('mime', 'LIKE', $mime . '%');
        }
        if (isset($parameter->sortField)) {
            $qb->orderBy($parameter->sortField, $parameter->sortOrder);
        }
        return $qb->paginate($parameter->perPage, ['*'], 'page', $parameter->page);
    }

}