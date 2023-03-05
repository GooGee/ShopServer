<?php

declare(strict_types=1);

namespace App\Ad\AttributeValue\ReadOne;

use App\AbstractBase\AbstractController;

use App\Ad\AttributeValue\CreateOne\CreateOneAttributeValueResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReadOneAttributeValueController extends AbstractController
{
    public function __invoke(int $id, ReadOneAttributeValue $readOne)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadOneAttributeValue')) {
            throw new AccessDeniedHttpException('Permission ReadOneAttributeValue required');
        }

        $item = $readOne->findOrFail($id);
        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }
        return CreateOneAttributeValueResponse::sendItem($item);
    }
}