<?php

declare(strict_types=1);

namespace App\Api\User\CreateOne;


use App\Models\User;
use App\Repository\UserRepository;

class CreateOneUser
{
    public function __construct(private UserRepository $repository)
    {
    }

    function __invoke(
        string $name,
        string $email,
        string $password,
    )
    {
        $item = new User();


        $item->name = $name;
        $item->email = $email;
        $item->password = bcrypt($password);


        $item->save();
        $item->refresh();

        event(new CreateOneUserEvent($item, $item));

        return $item;
    }

}