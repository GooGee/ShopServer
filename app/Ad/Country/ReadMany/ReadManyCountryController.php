<?php

declare(strict_types=1);

namespace App\Ad\Country\ReadMany;

use App\AbstractBase\AbstractController;
use App\AbstractBase\ReadManyRequest;

use App\Ad\Country\CreateOne\CreateOneCountryResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadManyCountryController extends AbstractController
{
    public function __invoke(ReadManyRequest $request, ReadManyCountry $readMany)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadManyCountry')) {
            throw new AccessDeniedHttpException('Permission ReadManyCountry required');
        }

        $itemzz = $readMany($request->input('idzz'))->all();

        return CreateOneCountryResponse::sendItemzz($itemzz);
    }
}