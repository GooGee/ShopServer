<?php

declare(strict_types=1);

namespace App\Ad\User\ReadMany;

use App\AbstractBase\AbstractController;
use App\AbstractBase\ReadManyRequest;

use App\Ad\User\CreateOne\CreateOneUserResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadManyUserController extends AbstractController
{
    public function __invoke(ReadManyRequest $request, ReadManyUser $readMany)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadManyUser')) {
            throw new AccessDeniedHttpException('Permission ReadManyUser required');
        }

        $itemzz = $readMany($request->input('idzz'))->all();

        return CreateOneUserResponse::sendItemzz($itemzz);
    }
}