<?php

declare(strict_types=1);

namespace App\Ad\AttributeValue\DeleteOne;

use App\Models\Admin;

use App\Repository\AttributeValueRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteOneAttributeValue
{
    public function __construct(private AttributeValueRepository $repository)
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

        event(new DeleteOneAttributeValueEvent($user, $item));

        return $item;
    }
}