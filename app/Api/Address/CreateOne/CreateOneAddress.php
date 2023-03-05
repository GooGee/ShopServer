<?php

declare(strict_types=1);

namespace App\Api\Address\CreateOne;

use App\Models\User;

use App\Models\Address;
use App\Repository\AddressRepository;

class CreateOneAddress
{
    public function __construct(private AddressRepository $repository)
    {
    }

    function __invoke(User $user,

                      int $countryId,
                      int $zip,
                      string $name,
                      string $phone,
                      string $text,
    )
    {
        $item = new Address();
        $item->userId = $user->id;

        $item->countryId = $countryId;
        $item->zip = $zip;
        $item->name = $name;
        $item->phone = $phone;
        $item->text = $text;

        $item->save();
        $item->refresh();

        event(new CreateOneAddressEvent($user, $item));

        return $item;
    }

}