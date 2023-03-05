<?php

declare(strict_types=1);

namespace App\Ad\ModelHasPermission\DeleteOne;

use App\AbstractBase\AbstractController;
use App\AbstractBase\AbstractResponse;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteOneModelHasPermissionController extends AbstractController
{
    public function __invoke(int $id, DeleteOneModelHasPermission $delete)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('DeleteOneModelHasPermission')) {
            throw new AccessDeniedHttpException('Permission DeleteOneModelHasPermission required');
        }

        $result = $delete($user, $id);

        return AbstractResponse::sendOK($result);
    }
}