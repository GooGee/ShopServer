<?php

declare(strict_types=1);

namespace App\Ad\Tag\CreateMany;

use App\AbstractBase\AbstractController;

use App\Ad\Tag\CreateOne\CreateOneTagResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class CreateManyTagController extends AbstractController
{
    public function __invoke(CreateManyTagRequest $request,
                             CreateManyTag $createMany,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('CreateManyTag')) {
            throw new AccessDeniedHttpException('Permission CreateManyTag required');
        }

        $itemzz = $createMany($user, $request->validated('itemzz'));

        return CreateOneTagResponse::sendItemzz($itemzz);
    }
}