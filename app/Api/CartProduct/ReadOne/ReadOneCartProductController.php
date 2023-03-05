<?php

declare(strict_types=1);

namespace App\Api\CartProduct\ReadOne;

use App\AbstractBase\AbstractController;

use App\Api\CartProduct\CreateOne\CreateOneCartProductResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReadOneCartProductController extends AbstractController
{
    public function __invoke(int $id, ReadOneCartProduct $readOne)
    {
        $item = $readOne->findOrFail($id);
        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }

        /** @var \App\Models\User $user */
        $user = auth()->user();

        if ($item->userId === $user->id) {
            return CreateOneCartProductResponse::sendItem($item);
        }
        throw new AccessDeniedHttpException();
    }
}