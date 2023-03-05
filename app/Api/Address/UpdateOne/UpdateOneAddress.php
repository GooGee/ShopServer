<?php

declare(strict_types=1);

namespace App\Api\Address\UpdateOne;

use App\Models\User;

use App\Repository\AddressRepository;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateOneAddress
{
    public function __construct(private AddressRepository $repository)
    {
    }

    function __invoke(int $id, User $user,

                      int $zip,
                      string $name,
                      string $phone,
                      string $text,)
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


        $item->zip = $zip;
        $item->name = $name;
        $item->phone = $phone;
        $item->text = $text;

        $item->save();

        event(new UpdateOneAddressEvent($user, $item));

        return $item;
    }

}