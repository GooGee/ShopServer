<?php

declare(strict_types=1);

namespace App\Ad\Chart\ReadOne;

use App\AbstractBase\AbstractController;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class ReadOneChartController extends AbstractController
{
    public function __invoke(int $id, ReadOneChart $readOne, ReadOneChartRequest $request)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('ReadOneChart')) {
            throw new AccessDeniedHttpException('Permission ReadOneChart required');
        }

        $item = $readOne(intval($request->validated('length')));
        return ReadOneChartResponse::sendItem($item);
    }
}