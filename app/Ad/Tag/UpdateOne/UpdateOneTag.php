<?php

declare(strict_types=1);

namespace App\Ad\Tag\UpdateOne;

use App\Models\Admin;

use App\Repository\TagRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateOneTag
{
    public function __construct(private TagRepository $repository)
    {
    }

    function __invoke(int $id, Admin $user,

                      string $name,)
    {
        $item = $this->repository->findOrFail($id);

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }


        $item->name = $name;

        $item->save();

        event(new UpdateOneTagEvent($user, $item));

        return $item;
    }

}