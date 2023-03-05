<?php

declare(strict_types=1);

namespace App\Api\Address\UpdateOne;

use App\AbstractBase\AbstractController;

use App\Api\Address\CreateOne\CreateOneAddressResponse;

class UpdateOneAddressController extends AbstractController
{
    public function __invoke(int $id,
                             UpdateOneAddressRequest $request,
                             UpdateOneAddress        $update,
    )
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $data = $request->validated();
        $item = $update($id,
            $user,

            $data['zip'],
            $data['name'],
            $data['phone'],
            $data['text'],
        );

        return CreateOneAddressResponse::sendItem($item);
    }
}