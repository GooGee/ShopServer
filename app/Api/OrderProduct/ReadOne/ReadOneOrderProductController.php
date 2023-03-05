<?php

declare(strict_types=1);

namespace App\Api\OrderProduct\ReadOne;

use App\AbstractBase\AbstractController;

use App\Api\OrderProduct\CreateOne\CreateOneOrderProductResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReadOneOrderProductController extends AbstractController
{
    public function __invoke(int $id, ReadOneOrderProduct $readOne)
    {
        $item = $readOne->findOrFail($id);
        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }

        /** @var \App\Models\User $user */
        $user = auth()->user();

        return CreateOneOrderProductResponse::sendItem($item);
    }
}