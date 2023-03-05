<?php

declare(strict_types=1);

namespace App\Ad\Role\UpdateOne;

use App\Models\Admin;

use App\Repository\RoleRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateOneRole
{
    public function __construct(private RoleRepository $repository)
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

        event(new UpdateOneRoleEvent($user, $item));

        return $item;
    }

}