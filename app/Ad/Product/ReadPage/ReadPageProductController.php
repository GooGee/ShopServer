<?php

declare(strict_types=1);

namespace App\Ad\Product\ReadPage;

use App\AbstractBase\AbstractController;

use App\Ad\Product\CreateOne\CreateOneProductResponse;
use App\Ad\Product\ReadPage\ReadPageProductRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadPageProductController extends AbstractController
{
    public function __invoke(ReadPageProductRequest $request, ReadPageProduct $readPage)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadPageProduct')) {
            throw new AccessDeniedHttpException('Permission ReadPageProduct required');
        }

        $page = $readPage($request->validated());

        return CreateOneProductResponse::sendPage($page);
    }
}