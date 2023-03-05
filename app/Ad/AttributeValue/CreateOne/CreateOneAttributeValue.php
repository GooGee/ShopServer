<?php

declare(strict_types=1);

namespace App\Ad\AttributeValue\CreateOne;

use App\Models\Admin;

use App\Models\AttributeValue;
use App\Repository\AttributeValueRepository;

class CreateOneAttributeValue
{
    public function __construct(private AttributeValueRepository $repository)
    {
    }

    function __invoke(Admin $user,

                      int $attributeId,
                      string $text,
    )
    {
        $item = new AttributeValue();

        $item->attributeId = $attributeId;
        $item->text = $text;

        $item->save();
        $item->refresh();

        event(new CreateOneAttributeValueEvent($user, $item));

        return $item;
    }

}