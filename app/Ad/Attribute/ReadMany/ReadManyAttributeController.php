<?php

declare(strict_types=1);

namespace App\Ad\Attribute\ReadMany;

use App\AbstractBase\AbstractController;
use App\AbstractBase\ReadManyRequest;

use App\Ad\Attribute\CreateOne\CreateOneAttributeResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadManyAttributeController extends AbstractController
{
    public function __invoke(ReadManyRequest $request, ReadManyAttribute $readMany)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadManyAttribute')) {
            throw new AccessDeniedHttpException('Permission ReadManyAttribute required');
        }

        $itemzz = $readMany($request->input('idzz'))->all();

        return CreateOneAttributeResponse::sendItemzz($itemzz);
    }
}