<?php

declare(strict_types=1);

namespace App\Ad\Country\UpdateOne;

use App\AbstractBase\AbstractController;

use App\Ad\Country\CreateOne\CreateOneCountryResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UpdateOneCountryController extends AbstractController
{
    public function __invoke(int $id,
                             UpdateOneCountryRequest $request,
                             UpdateOneCountry        $update,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('UpdateOneCountry')) {
            throw new AccessDeniedHttpException('Permission UpdateOneCountry required');
        }

        $item = $update($id,
            $user,

            $request->validated('name'),
        );

        return CreateOneCountryResponse::sendItem($item);
    }
}