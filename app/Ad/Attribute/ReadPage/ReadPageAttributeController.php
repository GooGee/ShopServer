<?php

declare(strict_types=1);

namespace App\Ad\Attribute\ReadPage;

use App\AbstractBase\AbstractController;

use App\Ad\Attribute\CreateOne\CreateOneAttributeResponse;
use App\Ad\Attribute\ReadPage\ReadPageAttributeRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadPageAttributeController extends AbstractController
{
    public function __invoke(ReadPageAttributeRequest $request, ReadPageAttribute $readPage)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadPageAttribute')) {
            throw new AccessDeniedHttpException('Permission ReadPageAttribute required');
        }

        $page = $readPage($request->validated());

        return CreateOneAttributeResponse::sendPage($page);
    }
}