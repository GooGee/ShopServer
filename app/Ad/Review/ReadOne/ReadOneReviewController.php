<?php

declare(strict_types=1);

namespace App\Ad\Review\ReadOne;

use App\AbstractBase\AbstractController;

use App\Ad\Review\CreateOne\CreateOneReviewResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ReadOneReviewController extends AbstractController
{
    public function __invoke(int $id, ReadOneReview $readOne)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadOneReview')) {
            throw new AccessDeniedHttpException('Permission ReadOneReview required');
        }

        $item = $readOne->findOrFail($id);
        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }
        return CreateOneReviewResponse::sendItem($item);
    }
}