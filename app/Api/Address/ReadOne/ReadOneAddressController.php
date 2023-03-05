<?php

declare(strict_types=1);

namespace App\Api\Address\ReadOne;

use App\AbstractBase\AbstractController;

use App\Api\Address\CreateOne\CreateOneAddressResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReadOneAddressController extends AbstractController
{
    public function __invoke(int $id, ReadOneAddress $readOne)
    {
        $item = $readOne->findOrFail($id);
        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }

        /** @var \App\Models\User $user */
        $user = auth()->user();

        if ($item->userId === $user->id) {
            return CreateOneAddressResponse::sendItem($item);
        }
        throw new AccessDeniedHttpException();
    }
}