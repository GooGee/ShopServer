<?php

declare(strict_types=1);

namespace App\Ad\Category\UpdateOne;

use App\AbstractBase\AbstractController;

use App\Ad\Category\CreateOne\CreateOneCategoryResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UpdateOneCategoryController extends AbstractController
{
    public function __invoke(int $id,
                             UpdateOneCategoryRequest $request,
                             UpdateOneCategory        $update,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('UpdateOneCategory')) {
            throw new AccessDeniedHttpException('Permission UpdateOneCategory required');
        }

        $data = $request->validated();
        $item = $update($id,
            $user,

            $data['parentId'],
            $data['name'],
            $data['image'],
        );

        return CreateOneCategoryResponse::sendItem($item);
    }
}