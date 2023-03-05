<?php

declare(strict_types=1);

namespace App\Ad\Tag\ReadMany;

use App\AbstractBase\AbstractController;
use App\AbstractBase\ReadManyRequest;

use App\Ad\Tag\CreateOne\CreateOneTagResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadManyTagController extends AbstractController
{
    public function __invoke(ReadManyRequest $request, ReadManyTag $readMany)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadManyTag')) {
            throw new AccessDeniedHttpException('Permission ReadManyTag required');
        }

        $itemzz = $readMany($request->input('idzz'))->all();

        return CreateOneTagResponse::sendItemzz($itemzz);
    }
}