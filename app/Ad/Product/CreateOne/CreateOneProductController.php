<?php

declare(strict_types=1);

namespace App\Ad\Product\CreateOne;

use App\AbstractBase\AbstractController;

use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class CreateOneProductController extends AbstractController
{
    public function __invoke(CreateOneProductRequest $request,
                             CreateOneProduct $create,
    )
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        if ($user->cannot('CreateOneProduct')) {
            throw new AccessDeniedHttpException('Permission CreateOneProduct required');
        }

        $data = $request->validated();
        $item = $create($user,

            $data['name'],
            $data['price'],
            $data['stock'],
            $data['image'],
            $data['imagezz'],
            $data['categoryId'],
            $data['discount'],
            $data['detail'],
            1,
        );

        return CreateOneProductResponse::sendItem($item);
    }
}