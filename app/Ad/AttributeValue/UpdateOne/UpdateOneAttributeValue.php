<?php

declare(strict_types=1);

namespace App\Ad\AttributeValue\UpdateOne;

use App\Models\Admin;

use App\Repository\AttributeValueRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateOneAttributeValue
{
    public function __construct(private AttributeValueRepository $repository)
    {
    }

    function __invoke(int $id, Admin $user,

                      int $attributeId,
                      string $text,)
    {
        $item = $this->repository->findOrFail($id);

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }


        $item->attributeId = $attributeId;
        $item->text = $text;

        $item->save();

        event(new UpdateOneAttributeValueEvent($user, $item));

        return $item;
    }

}