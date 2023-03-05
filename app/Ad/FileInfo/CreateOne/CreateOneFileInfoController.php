<?php

declare(strict_types=1);

namespace App\Ad\FileInfo\CreateOne;

use App\AbstractBase\AbstractController;
use Illuminate\Support\Facades\Storage;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class CreateOneFileInfoController extends AbstractController
{
    public function __invoke(CreateOneFileInfoRequest $request,
                             CreateOneFileInfo $create,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('CreateOneFileInfo')) {
            throw new AccessDeniedHttpException('Permission CreateOneFileInfo required');
        }

        $data = $request->validated();
        $pi = pathinfo($data['uri']);
        $to = Storage::disk('public')->path($pi['basename']);
        copy($data['uri'], $to);
        $item = $create($user,
            $to,
            mime_content_type($to),
            $data['uri'],
        );

        return CreateOneFileInfoResponse::sendItem($item);
    }
}