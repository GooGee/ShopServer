<?php

declare(strict_types=1);

namespace App\Ad\Tag\UpdateMany;

use App\AbstractBase\AbstractController;

use App\Ad\Tag\CreateOne\CreateOneTagResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UpdateManyTagController extends AbstractController
{
    public function __invoke(UpdateManyTagRequest $request,
                             UpdateManyTag $updateMany,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('UpdateManyTag')) {
            throw new AccessDeniedHttpException('Permission UpdateManyTag required');
        }

        $itemzz = $updateMany($user, $request->validated('itemzz'));

        return CreateOneTagResponse::sendItemzz($itemzz);
    }
}