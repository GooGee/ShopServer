<?php

declare(strict_types=1);

namespace App\Ad\Setting\ReadPage;

use App\AbstractBase\AbstractController;

use App\Ad\Setting\CreateOne\CreateOneSettingResponse;
use App\Ad\Setting\ReadPage\ReadPageSettingRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadPageSettingController extends AbstractController
{
    public function __invoke(ReadPageSettingRequest $request, ReadPageSetting $readPage)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadPageSetting')) {
            throw new AccessDeniedHttpException('Permission ReadPageSetting required');
        }

        $page = $readPage($request->validated());

        return CreateOneSettingResponse::sendPage($page);
    }
}