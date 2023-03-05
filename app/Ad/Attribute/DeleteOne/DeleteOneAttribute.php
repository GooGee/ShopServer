<?php

declare(strict_types=1);

namespace App\Ad\Attribute\DeleteOne;

use App\Models\Admin;

use App\Repository\AttributeRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteOneAttribute
{
    public function __construct(private AttributeRepository $repository)
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

        event(new DeleteOneAttributeEvent($user, $item));

        return $item;
    }
}