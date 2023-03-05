<?php

declare(strict_types=1);

namespace App\Ad\ModelHasRole\DeleteOne;

use App\Models\Admin;

use App\Repository\ModelHasRoleRepository;

class DeleteOneModelHasRole
{
    public function __construct(private ModelHasRoleRepository $repository)
    {
    }

    function __invoke(Admin $user, int $id)
    {
        $item = $this->repository->findOrFail($id);

        $item->delete();

        event(new DeleteOneModelHasRoleEvent($user, $item));

        return $item;
    }
}