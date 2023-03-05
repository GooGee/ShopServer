<?php

declare(strict_types=1);

namespace App\Api\Address\DeleteOne;

use App\AbstractBase\AbstractController;
use App\AbstractBase\AbstractResponse;


class DeleteOneAddressController extends AbstractController
{
    public function __invoke(int $id, DeleteOneAddress $delete)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $result = $delete($user, $id);

        return AbstractResponse::sendOK($result);
    }
}