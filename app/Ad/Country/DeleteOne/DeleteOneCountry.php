<?php

declare(strict_types=1);

namespace App\Ad\Country\DeleteOne;

use App\Models\Admin;

use App\Repository\CountryRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteOneCountry
{
    public function __construct(private CountryRepository $repository)
    {
    }

    function __invoke(Admin $user, int $id)
    {
        $item = $this->repository->findOrFail($id);

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }

        $item->delete();

        event(new DeleteOneCountryEvent($user, $item));

        return $item;
    }
}