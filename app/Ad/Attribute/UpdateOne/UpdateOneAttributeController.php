<?php

declare(strict_types=1);

namespace App\Ad\Attribute\UpdateOne;

use App\AbstractBase\AbstractController;

use App\Ad\Attribute\CreateOne\CreateOneAttributeResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UpdateOneAttributeController extends AbstractController
{
    public function __invoke(int $id,
                             UpdateOneAttributeRequest $request,
                             UpdateOneAttribute        $update,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('UpdateOneAttribute')) {
            throw new AccessDeniedHttpException('Permission UpdateOneAttribute required');
        }

        $item = $update($id,
            $user,

            $request->validated('categoryId'),
            $request->validated('name'),
        );

        return CreateOneAttributeResponse::sendItem($item);
    }
}