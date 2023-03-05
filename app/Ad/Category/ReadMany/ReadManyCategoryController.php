<?php

declare(strict_types=1);

namespace App\Ad\Category\ReadMany;

use App\AbstractBase\AbstractController;
use App\AbstractBase\ReadManyRequest;

use App\Ad\Category\CreateOne\CreateOneCategoryResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadManyCategoryController extends AbstractController
{
    public function __invoke(ReadManyRequest $request, ReadManyCategory $readMany)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadManyCategory')) {
            throw new AccessDeniedHttpException('Permission ReadManyCategory required');
        }

        $itemzz = $readMany($request->input('idzz'))->all();

        return CreateOneCategoryResponse::sendItemzz($itemzz);
    }
}