<?php

declare(strict_types=1);

namespace App\Ad\ModelHasPermission\DeleteOne;

use App\Models\Admin;

use App\Repository\ModelHasPermissionRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteOneModelHasPermission
{
    public function __construct(private ModelHasPermissionRepository $repository)
    {
    }

    function __invoke(Admin $user, int $id)
    {
        $item = $this->repository->findOrFail($id);

        $item->delete();

        event(new DeleteOneModelHasPermissionEvent($user, $item));

        return $item;
    }
}