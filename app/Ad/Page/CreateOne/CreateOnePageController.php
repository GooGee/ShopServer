<?php

declare(strict_types=1);

namespace App\Ad\Page\CreateOne;

use App\AbstractBase\AbstractController;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class CreateOnePageController extends AbstractController
{
    public function __invoke(CreateOnePageRequest $request,
                             CreateOnePage $create,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('CreateOnePage')) {
            throw new AccessDeniedHttpException('Permission CreateOnePage required');
        }

        $item = $create($user,

            $request->validated('title'),
            $request->validated('content'),
        );

        return CreateOnePageResponse::sendItem($item);
    }
}