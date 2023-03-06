<?php

declare(strict_types=1);

namespace App\Ad\Address\ReadPage;

use App\AbstractBase\AbstractController;

use App\Ad\Address\CreateOne\CreateOneAddressResponse;
use App\Ad\Address\ReadPage\ReadPageAddressRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadPageAddressController extends AbstractController
{
    public function __invoke(ReadPageAddressRequest $request, ReadPageAddress $readPage)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadPageAddress')) {
            throw new AccessDeniedHttpException('Permission ReadPageAddress required');
        }

        $page = $readPage->run($request->validated());

        return CreateOneAddressResponse::sendPage($page);
    }
}