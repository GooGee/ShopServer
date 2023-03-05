<?php

declare(strict_types=1);

namespace App\Ad\Admin\CreateOne;

use App\AbstractBase\AbstractController;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class CreateOneAdminController extends AbstractController
{
    public function __invoke(CreateOneAdminRequest $request,
                             CreateOneAdmin $create,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('CreateOneAdmin')) {
            throw new AccessDeniedHttpException();
        }

        $data = $request->validated();
        $item = $create($user,

            $data['name'],
            $data['email'],
            $data['password'],
        );

        return CreateOneAdminResponse::sendItem($item);
    }
}