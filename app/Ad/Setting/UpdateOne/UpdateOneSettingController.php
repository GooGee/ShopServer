<?php

declare(strict_types=1);

namespace App\Ad\Setting\UpdateOne;

use App\AbstractBase\AbstractController;

use App\Ad\Setting\CreateOne\CreateOneSettingResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UpdateOneSettingController extends AbstractController
{
    public function __invoke(int $id,
                             UpdateOneSettingRequest $request,
                             UpdateOneSetting        $update,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('UpdateOneSetting')) {
            throw new AccessDeniedHttpException('Permission UpdateOneSetting required');
        }

        $item = $update($id,
            $user,

            $request->validated('value'),
        );

        return CreateOneSettingResponse::sendItem($item);
    }
}