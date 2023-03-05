<?php

declare(strict_types=1);

namespace App\Ad\Tag\UpdateOne;

use App\AbstractBase\AbstractController;

use App\Ad\Tag\CreateOne\CreateOneTagResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UpdateOneTagController extends AbstractController
{
    public function __invoke(int $id,
                             UpdateOneTagRequest $request,
                             UpdateOneTag        $update,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('UpdateOneTag')) {
            throw new AccessDeniedHttpException('Permission UpdateOneTag required');
        }

        $item = $update($id,
            $user,

            $request->validated('name'),
        );

        return CreateOneTagResponse::sendItem($item);
    }
}