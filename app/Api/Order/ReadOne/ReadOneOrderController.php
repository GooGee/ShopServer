<?php

declare(strict_types=1);

namespace App\Api\Order\ReadOne;

use App\AbstractBase\AbstractController;

use App\Api\Order\CreateOne\CreateOneOrderResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReadOneOrderController extends AbstractController
{
    public function __invoke(int $id, ReadOneOrder $readOne)
    {
        $item = $readOne->findOrFail($id);
        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }

        /** @var \App\Models\User $user */
        $user = auth()->user();

        if ($item->userId === $user->id) {
            return CreateOneOrderResponse::sendItem($item);
        }
        throw new AccessDeniedHttpException();
    }
}