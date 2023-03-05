<?php

declare(strict_types=1);

namespace App\Ad\RoleHasPermission\CreateOne;

use App\Models\Admin;

use App\Models\RoleHasPermission;
use App\Repository\RoleHasPermissionRepository;

class CreateOneRoleHasPermission
{
    public function __construct(private RoleHasPermissionRepository $repository)
    {
    }

    function __invoke(Admin $user,

                      int $permission_id,
                      int $role_id,
    )
    {
        $item = new RoleHasPermission();

        $item->permission_id = $permission_id;
        $item->role_id = $role_id;

        $item->save();
        $item->refresh();

        event(new CreateOneRoleHasPermissionEvent($user, $item));

        return $item;
    }

}