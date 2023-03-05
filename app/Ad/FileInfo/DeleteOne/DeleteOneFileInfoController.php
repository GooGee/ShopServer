<?php

declare(strict_types=1);

namespace App\Ad\FileInfo\DeleteOne;

use App\AbstractBase\AbstractController;
use App\AbstractBase\AbstractResponse;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteOneFileInfoController extends AbstractController
{
    public function __invoke(int $id, DeleteOneFileInfo $delete)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('DeleteOneFileInfo')) {
            throw new AccessDeniedHttpException('Permission DeleteOneFileInfo required');
        }

        $result = $delete($user, $id);

        return AbstractResponse::sendOK($result);
    }
}