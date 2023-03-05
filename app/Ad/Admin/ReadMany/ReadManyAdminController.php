<?php

declare(strict_types=1);

namespace App\Ad\Admin\ReadMany;

use App\AbstractBase\AbstractController;
use App\AbstractBase\ReadManyRequest;

use App\Ad\Admin\CreateOne\CreateOneAdminResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadManyAdminController extends AbstractController
{
    public function __invoke(ReadManyRequest $request, ReadManyAdmin $readMany)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadManyAdmin')) {
            throw new AccessDeniedHttpException();
        }

        $itemzz = $readMany($request->input('idzz'))->all();

        return CreateOneAdminResponse::sendItemzz($itemzz);
    }
}