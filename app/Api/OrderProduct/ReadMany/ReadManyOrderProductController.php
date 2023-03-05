<?php

declare(strict_types=1);

namespace App\Api\OrderProduct\ReadMany;

use App\AbstractBase\AbstractController;
use App\AbstractBase\ReadManyRequest;
use App\Api\OrderProduct\CreateOne\CreateOneOrderProductResponse;


class ReadManyOrderProductController extends AbstractController
{
    public function __invoke(ReadManyOrderProductRequest $request, ReadManyOrderProduct $readMany)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $itemzz = $readMany->whereEqual($user, 'orderId', $request->input('orderId'))->all();
        return CreateOneOrderProductResponse::sendItemzz($itemzz);
    }
}