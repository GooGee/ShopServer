<?php

declare(strict_types=1);

namespace App\Ad\Admin\CreateOne;


use App\Models\Admin;
use App\Repository\AdminRepository;

class CreateOneAdmin
{
    public function __construct(private AdminRepository $repository)
    {
    }

    function __invoke(Admin $user,

                      string $name,
                      string $email,
                      string $password,
    )
    {
        $item = new Admin();

        $item->name = $name;
        $item->email = $email;
        $item->password = bcrypt($password);

        $item->save();
        $item->refresh();

        event(new CreateOneAdminEvent($user, $item));

        return $item;
    }

}