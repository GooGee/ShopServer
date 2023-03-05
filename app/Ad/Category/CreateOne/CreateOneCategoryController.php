<?php

declare(strict_types=1);

namespace App\Ad\Category\CreateOne;

use App\AbstractBase\AbstractController;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class CreateOneCategoryController extends AbstractController
{
    public function __invoke(CreateOneCategoryRequest $request,
                             CreateOneCategory $create,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('CreateOneCategory')) {
            throw new AccessDeniedHttpException('Permission CreateOneCategory required');
        }

        $data = $request->validated();
        $item = $create($user,

            $data['name'],
            $data['parentId'],
            $data['image'],
        );

        return CreateOneCategoryResponse::sendItem($item);
    }
}