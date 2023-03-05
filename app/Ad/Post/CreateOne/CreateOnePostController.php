<?php

declare(strict_types=1);

namespace App\Ad\Post\CreateOne;

use App\AbstractBase\AbstractController;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class CreateOnePostController extends AbstractController
{
    public function __invoke(CreateOnePostRequest $request,
                             CreateOnePost        $create,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('CreateOnePost')) {
            throw new AccessDeniedHttpException('Permission CreateOnePost required');
        }

        $item = $create->run($user,
            $user->id,
            null,
            $request->validated('reviewId'),
            $request->validated('text'),
        );

        return CreateOnePostResponse::sendItem($item);
    }
}