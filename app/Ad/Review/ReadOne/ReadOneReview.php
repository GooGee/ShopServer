<?php

declare(strict_types=1);

namespace App\Ad\Review\ReadOne;


use App\Repository\ReviewRepository;

class ReadOneReview
{
    public function __construct(private ReviewRepository $repository)
    {
    }

    function find(int $id)
    {
        return $this->repository->find($id);
    }

    function findOrFail(int $id)
    {
        return $this->repository->findOrFail($id);
    }

}