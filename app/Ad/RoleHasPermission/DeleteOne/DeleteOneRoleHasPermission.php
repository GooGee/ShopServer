<?php

declare(strict_types=1);

namespace App\Ad\RoleHasPermission\DeleteOne;

use App\Models\Admin;

use App\Repository\RoleHasPermissionRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteOneRoleHasPermission
{
    public function __construct(private RoleHasPermissionRepository $repository)
    {
    }

    function __invoke(Admin $user, int $id)
    {
        $item = $this->repository->findOrFail($id);

        $item->delete();

        event(new DeleteOneRoleHasPermissionEvent($user, $item));

        return $item;
    }
}