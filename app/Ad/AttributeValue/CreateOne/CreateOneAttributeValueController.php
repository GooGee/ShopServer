<?php

declare(strict_types=1);

namespace App\Ad\AttributeValue\CreateOne;

use App\AbstractBase\AbstractController;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class CreateOneAttributeValueController extends AbstractController
{
    public function __invoke(CreateOneAttributeValueRequest $request,
                             CreateOneAttributeValue $create,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('CreateOneAttributeValue')) {
            throw new AccessDeniedHttpException('Permission CreateOneAttributeValue required');
        }

        $item = $create($user,

            $request->validated('attributeId'),
            $request->validated('text'),
        );

        return CreateOneAttributeValueResponse::sendItem($item);
    }
}