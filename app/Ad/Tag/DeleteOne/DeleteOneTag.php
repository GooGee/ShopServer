<?php

declare(strict_types=1);

namespace App\Ad\Tag\DeleteOne;

use App\Models\Admin;

use App\Repository\TagRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteOneTag
{
    public function __construct(private TagRepository $repository)
    {
    }

    function __invoke(Admin $user, int $id)
    {
        $item = $this->repository->findOrFail($id);

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }

        $item->delete();

        event(new DeleteOneTagEvent($user, $item));

        return $item;
    }
}