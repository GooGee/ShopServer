<?php

declare(strict_types=1);

namespace App\Ad\Tag\DeleteMany;

use App\AbstractBase\AbstractController;
use App\AbstractBase\AbstractResponse;
use App\AbstractBase\DeleteManyRequest;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteManyTagController extends AbstractController
{
    public function __invoke(DeleteManyRequest $request, DeleteManyTag $deleteMany)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('DeleteManyTag')) {
            throw new AccessDeniedHttpException('Permission DeleteManyTag required');
        }

        $result = $deleteMany($user, $request->input('idzz'));

        return AbstractResponse::sendOK($result);
    }
}