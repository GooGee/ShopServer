<?php

declare(strict_types=1);

namespace App\Ad\AttributeValue\ReadPage;

use App\AbstractBase\AbstractController;

use App\Ad\AttributeValue\CreateOne\CreateOneAttributeValueResponse;
use App\Ad\AttributeValue\ReadPage\ReadPageAttributeValueRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadPageAttributeValueController extends AbstractController
{
    public function __invoke(ReadPageAttributeValueRequest $request, ReadPageAttributeValue $readPage)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadPageAttributeValue')) {
            throw new AccessDeniedHttpException('Permission ReadPageAttributeValue required');
        }

        $page = $readPage($request->validated());

        return CreateOneAttributeValueResponse::sendPage($page);
    }
}