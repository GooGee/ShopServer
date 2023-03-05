<?php

declare(strict_types=1);

namespace App\Api\Address\CreateOne;

use App\AbstractBase\AbstractController;


class CreateOneAddressController extends AbstractController
{
    public function __invoke(CreateOneAddressRequest $request,
                             CreateOneAddress $create,
    )
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $data = $request->validated();
        $item = $create($user,

            $data['countryId'],
            $data['zip'],
            $data['name'],
            $data['phone'],
            $data['text'],
        );

        return CreateOneAddressResponse::sendItem($item);
    }
}