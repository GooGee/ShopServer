<?php

declare(strict_types=1);

namespace App\Ad\Tag\DeleteOne;

use App\AbstractBase\AbstractController;
use App\AbstractBase\AbstractResponse;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteOneTagController extends AbstractController
{
    public function __invoke(int $id, DeleteOneTag $delete)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('DeleteOneTag')) {
            throw new AccessDeniedHttpException('Permission DeleteOneTag required');
        }

        $result = $delete($user, $id);

        return AbstractResponse::sendOK($result);
    }
}