<?php

declare(strict_types=1);

namespace App\Ad\Country\ReadPage;

use App\AbstractBase\AbstractController;

use App\Ad\Country\CreateOne\CreateOneCountryResponse;
use App\Ad\Country\ReadPage\ReadPageCountryRequest;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadPageCountryController extends AbstractController
{
    public function __invoke(ReadPageCountryRequest $request, ReadPageCountry $readPage)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadPageCountry')) {
            throw new AccessDeniedHttpException('Permission ReadPageCountry required');
        }

        $page = $readPage($request->validated());

        return CreateOneCountryResponse::sendPage($page);
    }
}