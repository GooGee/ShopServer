<?php

declare(strict_types=1);

namespace App\Api\Address\ReadPage;

use App\AbstractBase\AbstractController;

use App\Api\Address\CreateOne\CreateOneAddressResponse;
use App\Api\Address\ReadPage\ReadPageAddressRequest;

class ReadPageAddressController extends AbstractController
{
    public function __invoke(ReadPageAddressRequest $request, ReadPageAddress $readPage)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $page = $readPage($user, $request->validated());

        return CreateOneAddressResponse::sendPage($page);
    }
}