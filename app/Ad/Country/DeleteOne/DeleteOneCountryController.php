<?php

declare(strict_types=1);

namespace App\Ad\Country\DeleteOne;

use App\AbstractBase\AbstractController;
use App\AbstractBase\AbstractResponse;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteOneCountryController extends AbstractController
{
    public function __invoke(int $id, DeleteOneCountry $delete)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('DeleteOneCountry')) {
            throw new AccessDeniedHttpException('Permission DeleteOneCountry required');
        }

        $result = $delete($user, $id);

        return AbstractResponse::sendOK($result);
    }
}