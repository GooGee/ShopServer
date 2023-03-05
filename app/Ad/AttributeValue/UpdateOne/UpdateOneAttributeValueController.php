<?php

declare(strict_types=1);

namespace App\Ad\AttributeValue\UpdateOne;

use App\AbstractBase\AbstractController;

use App\Ad\AttributeValue\CreateOne\CreateOneAttributeValueResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UpdateOneAttributeValueController extends AbstractController
{
    public function __invoke(int $id,
                             UpdateOneAttributeValueRequest $request,
                             UpdateOneAttributeValue        $update,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('UpdateOneAttributeValue')) {
            throw new AccessDeniedHttpException('Permission UpdateOneAttributeValue required');
        }

        $item = $update($id,
            $user,

            $request->validated('attributeId'),
            $request->validated('text'),
        );

        return CreateOneAttributeValueResponse::sendItem($item);
    }
}