<?php

declare(strict_types=1);

namespace App\Ad\Category\DeleteOne;

use App\AbstractBase\AbstractController;
use App\AbstractBase\AbstractResponse;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteOneCategoryController extends AbstractController
{
    public function __invoke(int $id, DeleteOneCategory $delete)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('DeleteOneCategory')) {
            throw new AccessDeniedHttpException('Permission DeleteOneCategory required');
        }

        $result = $delete($user, $id);

        return AbstractResponse::sendOK($result);
    }
}