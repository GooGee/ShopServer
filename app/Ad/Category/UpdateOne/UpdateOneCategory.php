<?php

declare(strict_types=1);

namespace App\Ad\Category\UpdateOne;

use App\Models\Admin;

use App\Repository\CategoryRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateOneCategory
{
    public function __construct(private CategoryRepository $repository)
    {
    }

    function __invoke(int $id, Admin $user,

                      ?int $parentId,
                      string $name,
                      string $image,)
    {
        $item = $this->repository->findOrFail($id);

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }


        $item->parentId = $parentId;
        $item->name = $name;
        $item->image = $image;

        $item->save();

        event(new UpdateOneCategoryEvent($user, $item));

        return $item;
    }

}