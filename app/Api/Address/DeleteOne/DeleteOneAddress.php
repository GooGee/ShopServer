<?php

declare(strict_types=1);

namespace App\Api\Address\DeleteOne;

use App\Models\User;

use App\Repository\AddressRepository;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteOneAddress
{
    public function __construct(private AddressRepository $repository)
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

        event(new DeleteOneAddressEvent($user, $item));

        return $item;
    }
}