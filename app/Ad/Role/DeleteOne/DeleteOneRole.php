<?php

declare(strict_types=1);

namespace App\Ad\Role\DeleteOne;

use App\Models\Admin;

use App\Repository\RoleRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteOneRole
{
    public function __construct(private RoleRepository $repository)
    {
    }

    function __invoke(Admin $user, int $id)
    {
        $item = $this->repository->findOrFail($id);

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }

        $item->delete();

        event(new DeleteOneRoleEvent($user, $item));

        return $item;
    }
}