<?php

declare(strict_types=1);

namespace App\Api\User\CreateOne;

use App\AbstractBase\AbstractController;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;


class CreateOneUserController extends AbstractController
{
    public function __invoke(CreateOneUserRequest $request,
                             CreateOneUserService $service,
    )
    {
        if (auth()->user()) {
            throw new BadRequestHttpException(trans('auth.only_guest'));
        }

        $item = $service->run($request->validated());

        return CreateOneUserResponse::sendItem($item);
    }

}