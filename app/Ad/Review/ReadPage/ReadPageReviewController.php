<?php

declare(strict_types=1);

namespace App\Ad\Review\ReadPage;

use App\AbstractBase\AbstractController;

use App\Ad\Review\CreateOne\CreateOneReviewResponse;
use App\Ad\Review\ReadPage\ReadPageReviewRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadPageReviewController extends AbstractController
{
    public function __invoke(ReadPageReviewRequest $request, ReadPageReview $readPage)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadPageReview')) {
            throw new AccessDeniedHttpException('Permission ReadPageReview required');
        }

        $page = $readPage($request->validated());

        return CreateOneReviewResponse::sendPage($page);
    }
}