<?php

declare(strict_types=1);

namespace App\Ad\Role\CreateOne;

use App\Models\Admin;

use App\Models\Role;
use App\Repository\RoleRepository;

class CreateOneRole
{
    public function __construct(private RoleRepository $repository)
    {
    }

    function __invoke(Admin  $user,

                      string $name,
    )
    {
        $item = new Role();

        $item->name = $name;
        $item->guard_name = 'admin';
        $item->isUserCreated = true;

        $item->save();
        $item->refresh();

        event(new CreateOneRoleEvent($user, $item));

        return $item;
    }

}