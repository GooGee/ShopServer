<?php

declare(strict_types=1);

namespace App\Ad\ModelHasPermission\CreateOne;

use App\Models\Admin;

use App\Repository\AdminRepository;
use App\Repository\ModelHasPermissionRepository;
use App\Repository\PermissionRepository;

class CreateOneModelHasPermission
{
    public function __construct(private AdminRepository              $adminRepository,
                                private ModelHasPermissionRepository $repository,
                                private PermissionRepository         $permissionRepository,
    )
    {
    }

    function __invoke(Admin $user,

                      int   $permission_id,
                      int   $model_id,
    )
    {
        $model = $this->adminRepository->findOrFail($model_id);
        $permission = $this->permissionRepository->findOrFail($permission_id);
        $model->givePermissionTo($permission);

        $item = $this->repository->query()
            ->where('model_id', $model_id)
            ->where('permission_id', $permission_id)
            ->first();

        event(new CreateOneModelHasPermissionEvent($user, $item));

        return $item;
    }

}