<?php

declare(strict_types=1);

namespace App\Ad\Category\DeleteOne;

use App\Models\Admin;

use App\Repository\CategoryRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteOneCategory
{
    public function __construct(private CategoryRepository $repository)
    {
    }

    function __invoke(Admin $user, int $id)
    {
        $item = $this->repository->findOrFail($id);

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }

        $item->dtDelete = now();
        $item->save();

        event(new DeleteOneCategoryEvent($user, $item));

        return $item;
    }
}