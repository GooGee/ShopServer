<?php

declare(strict_types=1);

namespace App\Api\CartProduct\DeleteOne;

use App\AbstractBase\AbstractController;
use App\AbstractBase\AbstractResponse;


class DeleteOneCartProductController extends AbstractController
{
    public function __invoke(int $id, DeleteOneCartProduct $delete)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $result = $delete($user, $id);

        return AbstractResponse::sendOK($result);
    }
}