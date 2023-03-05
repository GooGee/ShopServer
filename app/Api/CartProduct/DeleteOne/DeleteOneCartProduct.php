<?php

declare(strict_types=1);

namespace App\Api\CartProduct\DeleteOne;

use App\Models\User;

use App\Repository\CartProductRepository;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteOneCartProduct
{
    public function __construct(private CartProductRepository $repository)
    {
    }

    function __invoke(User $user, int $id)
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

        $item->dtDelete = now();
        $item->save();

        event(new DeleteOneCartProductEvent($user, $item));

        return $item;
    }
}