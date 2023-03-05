<?php

declare(strict_types=1);

namespace App\Ad\AdminSession\CreateOne;


use App\Models\Admin;
use App\Models\AdminSession;
use App\Repository\AdminSessionRepository;

class CreateOneAdminSession
{
    public function __construct(private AdminSessionRepository $repository)
    {
    }

    function __invoke(Admin $user,

    )
    {
        $item = new AdminSession();
        $item->adminId = $user->id;


        $item->save();
        $item->refresh();

        event(new CreateOneAdminSessionEvent($user, $item));

        return $item;
    }

}