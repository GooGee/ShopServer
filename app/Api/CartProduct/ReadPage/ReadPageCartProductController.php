<?php

declare(strict_types=1);

namespace App\Api\CartProduct\ReadPage;

use App\AbstractBase\AbstractController;

use App\Api\CartProduct\CreateOne\CreateOneCartProductResponse;
use App\Api\CartProduct\ReadPage\ReadPageCartProductRequest;

class ReadPageCartProductController extends AbstractController
{
    public function __invoke(ReadPageCartProductRequest $request, ReadPageCartProduct $readPage)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $page = $readPage($user, $request->validated());

        return CreateOneCartProductResponse::sendPage($page);
    }
}