<?php

declare(strict_types=1);

namespace App\Ad\Country\ReadOne;

use App\AbstractBase\AbstractController;

use App\Ad\Country\CreateOne\CreateOneCountryResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReadOneCountryController extends AbstractController
{
    public function __invoke(int $id, ReadOneCountry $readOne)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadOneCountry')) {
            throw new AccessDeniedHttpException('Permission ReadOneCountry required');
        }

        $item = $readOne->findOrFail($id);
        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }
        return CreateOneCountryResponse::sendItem($item);
    }
}