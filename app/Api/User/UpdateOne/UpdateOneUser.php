<?php

declare(strict_types=1);

namespace App\Api\User\UpdateOne;

use App\Models\User;

use App\Repository\UserRepository;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateOneUser
{
    public function __construct(private UserRepository $repository)
    {
    }

    function __invoke(int $id, User $user,
    )
    {
        $item = $this->repository->findOrFail($id);

        if ($user->id === $item->userId) {
            //
        } else {
            throw new AccessDeniedHttpException();
        }

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }


        $item->save();

        event(new UpdateOneUserEvent($user, $item));

        return $item;
    }

    function increaseOrder(User $user, int $spend)
    {
        $user->aaOrder += 1;
        $user->aaSpend += $spend;

        $user->save();

        event(new UpdateOneUserEvent($user, $user));

        return $user;
    }
}