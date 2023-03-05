<?php

declare(strict_types=1);

namespace App\Ad\Country\CreateOne;

use App\AbstractBase\AbstractController;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class CreateOneCountryController extends AbstractController
{
    public function __invoke(CreateOneCountryRequest $request,
                             CreateOneCountry $create,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('CreateOneCountry')) {
            throw new AccessDeniedHttpException('Permission CreateOneCountry required');
        }

        $item = $create($user,

            $request->validated('name'),
        );

        return CreateOneCountryResponse::sendItem($item);
    }
}