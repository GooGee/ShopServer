<?php

declare(strict_types=1);

namespace App\Ad\Page\ReadMany;

use App\AbstractBase\AbstractController;
use App\AbstractBase\ReadManyRequest;

use App\Ad\Page\CreateOne\CreateOnePageResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadManyPageController extends AbstractController
{
    public function __invoke(ReadManyRequest $request, ReadManyPage $readMany)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadManyPage')) {
            throw new AccessDeniedHttpException('Permission ReadManyPage required');
        }

        $itemzz = $readMany($request->input('idzz'))->all();

        return CreateOnePageResponse::sendItemzz($itemzz);
    }
}