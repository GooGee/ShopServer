<?php

declare(strict_types=1);

namespace App\Api\CartProduct\DeleteMany;

use App\AbstractBase\AbstractController;
use App\AbstractBase\AbstractResponse;
use App\AbstractBase\DeleteManyRequest;


class DeleteManyCartProductController extends AbstractController
{
    public function __invoke(DeleteManyRequest $request, DeleteManyCartProduct $deleteMany)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $result = $deleteMany($user, $request->input('idzz'));

        return AbstractResponse::sendOK($result);
    }
}