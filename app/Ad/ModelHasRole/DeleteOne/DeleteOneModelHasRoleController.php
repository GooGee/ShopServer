<?php

declare(strict_types=1);

namespace App\Ad\ModelHasRole\DeleteOne;

use App\AbstractBase\AbstractController;
use App\AbstractBase\AbstractResponse;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteOneModelHasRoleController extends AbstractController
{
    public function __invoke(int $id, DeleteOneModelHasRole $delete)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('DeleteOneModelHasRole')) {
            throw new AccessDeniedHttpException('Permission DeleteOneModelHasRole required');
        }

        $result = $delete($user, $id);

        return AbstractResponse::sendOK($result);
    }
}