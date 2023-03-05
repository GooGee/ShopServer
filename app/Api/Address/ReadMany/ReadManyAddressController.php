<?php

declare(strict_types=1);

namespace App\Api\Address\ReadMany;

use App\AbstractBase\AbstractController;
use App\AbstractBase\ReadManyRequest;

use App\Api\Address\CreateOne\CreateOneAddressResponse;

class ReadManyAddressController extends AbstractController
{
    public function __invoke(ReadManyRequest $request, ReadManyAddress $readMany)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $itemzz = $readMany($user, $request->input('idzz'))->all();

        return CreateOneAddressResponse::sendItemzz($itemzz);
    }
}