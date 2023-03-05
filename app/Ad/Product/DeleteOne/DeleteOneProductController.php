<?php

declare(strict_types=1);

namespace App\Ad\Product\DeleteOne;

use App\AbstractBase\AbstractController;
use App\AbstractBase\AbstractResponse;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteOneProductController extends AbstractController
{
    public function __invoke(int $id, DeleteOneProduct $delete)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('DeleteOneProduct')) {
            throw new AccessDeniedHttpException('Permission DeleteOneProduct required');
        }

        $result = $delete($user, $id);

        return AbstractResponse::sendOK($result);
    }
}