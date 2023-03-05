<?php

declare(strict_types=1);

namespace App\Ad\Country\UpdateOne;

use App\Models\Admin;

use App\Repository\CountryRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateOneCountry
{
    public function __construct(private CountryRepository $repository)
    {
    }

    function __invoke(int $id, Admin $user,

                      string $name,)
    {
        $item = $this->repository->findOrFail($id);

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }


        $item->name = $name;

        $item->save();

        event(new UpdateOneCountryEvent($user, $item));

        return $item;
    }

}