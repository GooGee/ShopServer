<?php

declare(strict_types=1);

namespace App\Ad\Page\UpdateOne;

use App\AbstractBase\AbstractController;

use App\Ad\Page\CreateOne\CreateOnePageResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UpdateOnePageController extends AbstractController
{
    public function __invoke(int $id,
                             UpdateOnePageRequest $request,
                             UpdateOnePage        $update,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('UpdateOnePage')) {
            throw new AccessDeniedHttpException('Permission UpdateOnePage required');
        }

        $item = $update($id,
            $user,

            $request->validated('title'),
            $request->validated('content'),
        );

        return CreateOnePageResponse::sendItem($item);
    }
}