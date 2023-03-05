<?php

declare(strict_types=1);

namespace App\Ad\Country\CreateOne;

use App\Models\Admin;

use App\Models\Country;
use App\Repository\CountryRepository;

class CreateOneCountry
{
    public function __construct(private CountryRepository $repository)
    {
    }

    function __invoke(Admin $user,

                      string $name,
    )
    {
        $item = new Country();

        $item->name = $name;

        $item->save();
        $item->refresh();

        event(new CreateOneCountryEvent($user, $item));

        return $item;
    }

}