<?php

declare(strict_types=1);

namespace App\Ad\User\UpdateOne;

use App\Models\Admin;

use App\Repository\UserRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateOneUser
{
    public function __construct(private UserRepository $repository)
    {
    }

    function __invoke(int $id, Admin $user,
    )
    {
        $item = $this->repository->findOrFail($id);

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }


        $item->save();

        event(new UpdateOneUserEvent($user, $item));

        return $item;
    }

}