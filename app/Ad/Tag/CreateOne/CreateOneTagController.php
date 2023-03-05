<?php

declare(strict_types=1);

namespace App\Ad\Tag\CreateOne;

use App\AbstractBase\AbstractController;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class CreateOneTagController extends AbstractController
{
    public function __invoke(CreateOneTagRequest $request,
                             CreateOneTag $create,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('CreateOneTag')) {
            throw new AccessDeniedHttpException('Permission CreateOneTag required');
        }

        $item = $create($user,

            $request->validated('name'),
        );

        return CreateOneTagResponse::sendItem($item);
    }
}