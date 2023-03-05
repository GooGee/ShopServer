<?php

declare(strict_types=1);

namespace App\Ad\Attribute\ReadOne;

use App\AbstractBase\AbstractController;

use App\Ad\Attribute\CreateOne\CreateOneAttributeResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReadOneAttributeController extends AbstractController
{
    public function __invoke(int $id, ReadOneAttribute $readOne)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadOneAttribute')) {
            throw new AccessDeniedHttpException('Permission ReadOneAttribute required');
        }

        $item = $readOne->findOrFail($id);
        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }
        return CreateOneAttributeResponse::sendItem($item);
    }
}