<?php

declare(strict_types=1);

namespace App\Ad\Attribute\CreateOne;

use App\AbstractBase\AbstractController;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class CreateOneAttributeController extends AbstractController
{
    public function __invoke(CreateOneAttributeRequest $request,
                             CreateOneAttribute $create,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('CreateOneAttribute')) {
            throw new AccessDeniedHttpException('Permission CreateOneAttribute required');
        }

        $item = $create($user,

            $request->validated('categoryId'),
            $request->validated('name'),
        );

        return CreateOneAttributeResponse::sendItem($item);
    }
}