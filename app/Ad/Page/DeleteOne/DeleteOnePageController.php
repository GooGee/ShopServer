<?php

declare(strict_types=1);

namespace App\Ad\Page\DeleteOne;

use App\AbstractBase\AbstractController;
use App\AbstractBase\AbstractResponse;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteOnePageController extends AbstractController
{
    public function __invoke(int $id, DeleteOnePage $delete)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('DeleteOnePage')) {
            throw new AccessDeniedHttpException('Permission DeleteOnePage required');
        }

        $result = $delete($user, $id);

        return AbstractResponse::sendOK($result);
    }
}