<?php

declare(strict_types=1);

namespace App\Ad\ProductSku\DeleteOne;

use App\AbstractBase\AbstractController;
use App\AbstractBase\AbstractResponse;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteOneProductSkuController extends AbstractController
{
    public function __invoke(int $id, DeleteOneProductSku $delete)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('DeleteOneProductSku')) {
            throw new AccessDeniedHttpException('Permission DeleteOneProductSku required');
        }

        $result = $delete($user, $id);

        return AbstractResponse::sendOK($result);
    }
}