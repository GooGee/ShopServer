<?php

declare(strict_types=1);

namespace App\Ad\Address\ReadMany;

use App\AbstractBase\AbstractController;
use App\AbstractBase\ReadManyRequest;

use App\Ad\Address\CreateOne\CreateOneAddressResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadManyAddressController extends AbstractController
{
    public function __invoke(ReadManyRequest $request, ReadManyAddress $readMany)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadManyAddress')) {
            throw new AccessDeniedHttpException('Permission ReadManyAddress required');
        }

        $itemzz = $readMany($request->input('idzz'))->all();

        return CreateOneAddressResponse::sendItemzz($itemzz);
    }
}