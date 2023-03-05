<?php

declare(strict_types=1);

namespace App\Ad\User\DeleteOne;

use App\Models\Admin;

use App\Repository\UserRepository;

class DeleteOneUser
{
    public function __construct(private UserRepository $repository)
    {
    }

    function __invoke(Admin $user, int $id)
    {
        $item = $this->repository->findOrFail($id);

        if ($item->dtDelete) {
            $item->dtDelete = null;
        } else {
            $item->dtDelete = now();
        }

        $item->save();

        event(new DeleteOneUserEvent($user, $item));

        return $item;
    }
}