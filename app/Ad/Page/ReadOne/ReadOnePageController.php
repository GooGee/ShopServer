<?php

declare(strict_types=1);

namespace App\Ad\Page\ReadOne;

use App\AbstractBase\AbstractController;

use App\Ad\Page\CreateOne\CreateOnePageResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReadOnePageController extends AbstractController
{
    public function __invoke(int $id, ReadOnePage $readOne)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadOnePage')) {
            throw new AccessDeniedHttpException('Permission ReadOnePage required');
        }

        $item = $readOne->findOrFail($id);
        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }
        return CreateOnePageResponse::sendItem($item);
    }
}