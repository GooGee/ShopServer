<?php

declare(strict_types=1);

namespace App\Ad\Attribute\DeleteOne;

use App\AbstractBase\AbstractController;
use App\AbstractBase\AbstractResponse;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteOneAttributeController extends AbstractController
{
    public function __invoke(int $id, DeleteOneAttribute $delete)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('DeleteOneAttribute')) {
            throw new AccessDeniedHttpException('Permission DeleteOneAttribute required');
        }

        $result = $delete($user, $id);

        return AbstractResponse::sendOK($result);
    }
}