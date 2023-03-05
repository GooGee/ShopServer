<?php

declare(strict_types=1);

namespace App\Ad\Role\DeleteOne;

use App\AbstractBase\AbstractController;
use App\AbstractBase\AbstractResponse;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteOneRoleController extends AbstractController
{
    public function __invoke(int $id, DeleteOneRole $delete)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('DeleteOneRole')) {
            throw new AccessDeniedHttpException('Permission DeleteOneRole required');
        }

        $result = $delete($user, $id);

        return AbstractResponse::sendOK($result);
    }
}