<?php

declare(strict_types=1);

namespace App\Ad\ModelHasRole\CreateOne;

use App\Models\Admin;

use App\Repository\AdminRepository;
use App\Repository\ModelHasRoleRepository;
use App\Repository\RoleRepository;

class CreateOneModelHasRole
{
    public function __construct(private AdminRepository        $adminRepository,
                                private ModelHasRoleRepository $repository,
                                private RoleRepository         $roleRepository,
    )
    {
    }

    function __invoke(Admin $user,

                      int   $role_id,
                      int   $model_id,
    )
    {

        $model = $this->adminRepository->findOrFail($model_id);
        $role = $this->roleRepository->findOrFail($role_id);
        $model->assignRole($role);

        $item = $this->repository->query()
            ->where('model_id', $model_id)
            ->where('role_id', $role_id)
            ->first();

        event(new CreateOneModelHasRoleEvent($user, $item));

        return $item;
    }

}