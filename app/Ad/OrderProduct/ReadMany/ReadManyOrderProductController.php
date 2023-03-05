<?php

declare(strict_types=1);

namespace App\Ad\OrderProduct\ReadMany;

use App\AbstractBase\AbstractController;
use App\AbstractBase\ReadManyRequest;

use App\Ad\OrderProduct\CreateOne\CreateOneOrderProductResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadManyOrderProductController extends AbstractController
{
    public function __invoke(ReadManyRequest $request, ReadManyOrderProduct $readMany)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadManyOrderProduct')) {
            throw new AccessDeniedHttpException('Permission ReadManyOrderProduct required');
        }

        $itemzz = $readMany($request->input('idzz'))->all();

        return CreateOneOrderProductResponse::sendItemzz($itemzz);
    }
}