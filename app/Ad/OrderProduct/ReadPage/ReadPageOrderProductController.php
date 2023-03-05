<?php

declare(strict_types=1);

namespace App\Ad\OrderProduct\ReadPage;

use App\AbstractBase\AbstractController;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadPageOrderProductController extends AbstractController
{
    public function __invoke(ReadPageOrderProductRequest $request, ReadPageOrderProduct $readPage)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadPageOrderProduct')) {
            throw new AccessDeniedHttpException('Permission ReadPageOrderProduct required');
        }

        $page = $readPage($request->validated());

        return ReadPageOrderProductResponse::sendPage($page);
    }
}