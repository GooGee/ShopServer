<?php

declare(strict_types=1);

namespace App\Ad\AdminSession\CreateOne;

use App\AbstractBase\AbstractController;
use App\Ad\Admin\CreateOne\CreateOneAdminResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;


class CreateOneAdminSessionController extends AbstractController
{
    public function __invoke(CreateOneAdminSessionRequest $request,
                             CreateOneAdminSession        $create,
    )
    {
        $data = $request->validated();

        if (auth()->guard('admin')->attempt($data, true) === false) {
            throw new BadRequestHttpException(trans('auth.failed'));
        }

        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();
        if ($user->dtDelete) {
            throw new AccessDeniedHttpException();
        }

        $item = $create($user,

        );

        return CreateOneAdminResponse::sendItem($item);
    }

}