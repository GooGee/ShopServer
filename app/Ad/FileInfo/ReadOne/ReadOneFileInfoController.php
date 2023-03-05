<?php

declare(strict_types=1);

namespace App\Ad\FileInfo\ReadOne;

use App\AbstractBase\AbstractController;

use App\Ad\FileInfo\CreateOne\CreateOneFileInfoResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReadOneFileInfoController extends AbstractController
{
    public function __invoke(int $id, ReadOneFileInfo $readOne)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadOneFileInfo')) {
            throw new AccessDeniedHttpException('Permission ReadOneFileInfo required');
        }

        $item = $readOne->findOrFail($id);
        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }
        return CreateOneFileInfoResponse::sendItem($item);
    }
}