<?php

declare(strict_types=1);

namespace App\Ad\Admin\DeleteOne;

use App\AbstractBase\AbstractController;
use App\AbstractBase\AbstractResponse;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteOneAdminController extends AbstractController
{
    public function __invoke(int $id, DeleteOneAdmin $delete)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('DeleteOneAdmin')) {
            throw new AccessDeniedHttpException('Permission DeleteOneAdmin required');
        }

        $result = $delete($user, $id);

        return AbstractResponse::sendOK($result);
    }
}