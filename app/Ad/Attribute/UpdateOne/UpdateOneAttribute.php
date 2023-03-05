<?php

declare(strict_types=1);

namespace App\Ad\Attribute\UpdateOne;

use App\Models\Admin;

use App\Repository\AttributeRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateOneAttribute
{
    public function __construct(private AttributeRepository $repository)
    {
    }

    function __invoke(int $id, Admin $user,

                      int $categoryId,
                      string $name,)
    {
        $item = $this->repository->findOrFail($id);

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }


        $item->categoryId = $categoryId;
        $item->name = $name;

        $item->save();

        event(new UpdateOneAttributeEvent($user, $item));

        return $item;
    }

}