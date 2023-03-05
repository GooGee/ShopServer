<?php

declare(strict_types=1);

namespace App\Api\CartProduct\UpdateOne;

use App\Models\User;

use App\Repository\CartProductRepository;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateOneCartProduct
{
    public function __construct(private CartProductRepository $repository)
    {
    }

    function __invoke(int $id, User $user,

                      int $amount,)
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


        $item->amount = $amount;

        $item->save();

        event(new UpdateOneCartProductEvent($user, $item));

        return $item;
    }

}