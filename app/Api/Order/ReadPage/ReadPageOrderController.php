<?php

declare(strict_types=1);

namespace App\Api\Order\ReadPage;

use App\AbstractBase\AbstractController;

use App\Api\Order\CreateOne\CreateOneOrderResponse;
use App\Api\Order\ReadPage\ReadPageOrderRequest;

class ReadPageOrderController extends AbstractController
{
    public function __invoke(ReadPageOrderRequest $request, ReadPageOrder $readPage)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();

        $page = $readPage($user, $request->validated());

        return CreateOneOrderResponse::sendPage($page);
    }
}