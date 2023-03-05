<?php

declare(strict_types=1);

namespace App\Ad\User\DeleteOne;

use App\AbstractBase\AbstractController;
use App\AbstractBase\AbstractResponse;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteOneUserController extends AbstractController
{
    public function __invoke(int $id, DeleteOneUser $delete)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('DeleteOneUser')) {
            throw new AccessDeniedHttpException('Permission DeleteOneUser required');
        }

        $result = $delete($user, $id);

        return AbstractResponse::sendOK($result);
    }
}