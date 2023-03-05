<?php

declare(strict_types=1);

namespace App\Ad\AttributeValue\DeleteOne;

use App\AbstractBase\AbstractController;
use App\AbstractBase\AbstractResponse;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteOneAttributeValueController extends AbstractController
{
    public function __invoke(int $id, DeleteOneAttributeValue $delete)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('DeleteOneAttributeValue')) {
            throw new AccessDeniedHttpException('Permission DeleteOneAttributeValue required');
        }

        $result = $delete($user, $id);

        return AbstractResponse::sendOK($result);
    }
}