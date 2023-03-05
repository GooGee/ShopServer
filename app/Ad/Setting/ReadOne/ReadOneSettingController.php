<?php

declare(strict_types=1);

namespace App\Ad\Setting\ReadOne;

use App\AbstractBase\AbstractController;

use App\Ad\Setting\CreateOne\CreateOneSettingResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReadOneSettingController extends AbstractController
{
    public function __invoke(int $id, ReadOneSetting $readOne)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadOneSetting')) {
            throw new AccessDeniedHttpException('Permission ReadOneSetting required');
        }

        $item = $readOne->findOrFail($id);
        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }
        return CreateOneSettingResponse::sendItem($item);
    }
}