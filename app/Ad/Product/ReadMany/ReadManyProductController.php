<?php

declare(strict_types=1);

namespace App\Ad\Product\ReadMany;

use App\AbstractBase\AbstractController;
use App\AbstractBase\ReadManyRequest;

use App\Ad\Product\CreateOne\CreateOneProductResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadManyProductController extends AbstractController
{
    public function __invoke(ReadManyRequest $request, ReadManyProduct $readMany)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadManyProduct')) {
            throw new AccessDeniedHttpException('Permission ReadManyProduct required');
        }

        $itemzz = $readMany($request->input('idzz'))->all();

        return CreateOneProductResponse::sendItemzz($itemzz);
    }
}