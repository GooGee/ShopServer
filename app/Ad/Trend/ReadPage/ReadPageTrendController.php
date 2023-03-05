<?php

declare(strict_types=1);

namespace App\Ad\Trend\ReadPage;

use App\AbstractBase\AbstractController;

use App\Ad\Trend\CreateOne\CreateOneTrendResponse;
use App\Ad\Trend\ReadPage\ReadPageTrendRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadPageTrendController extends AbstractController
{
    public function __invoke(ReadPageTrendRequest $request, ReadPageTrend $readPage)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadPageTrend')) {
            throw new AccessDeniedHttpException('Permission ReadPageTrend required');
        }

        $page = $readPage($request->validated());

        return CreateOneTrendResponse::sendPage($page);
    }
}