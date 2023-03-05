<?php

declare(strict_types=1);

namespace App\Ad\Product\UpdateOne;

use App\AbstractBase\AbstractController;

use App\Ad\Product\CreateOne\CreateOneProductResponse;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class UpdateOneProductController extends AbstractController
{
    public function __invoke(int $id,
                             UpdateOneProductRequest $request,
                             UpdateOneProduct        $update,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('UpdateOneProduct')) {
            throw new AccessDeniedHttpException('Permission UpdateOneProduct required');
        }

        $data = $request->validated();
        $item = $update($id,
            $user,

            $request->validated('name'),
            $request->validated('price'),
            $request->validated('stock'),
            $request->validated('image'),
            $request->validated('imagezz'),
            $request->validated('categoryId'),
            $request->validated('discount'),
            $request->validated('detail'),
            $request->validated('dtPublish'),
        );

        return CreateOneProductResponse::sendItem($item);
    }
}