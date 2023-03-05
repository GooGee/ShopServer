<?php

declare(strict_types=1);

namespace App\Ad\Attribute\CreateOne;

use App\Models\Admin;

use App\Models\Attribute;
use App\Repository\AttributeRepository;

class CreateOneAttribute
{
    public function __construct(private AttributeRepository $repository)
    {
    }

    function __invoke(Admin $user,

                      int $categoryId,
                      string $name,
    )
    {
        $item = new Attribute();

        $item->categoryId = $categoryId;
        $item->name = $name;

        $item->save();
        $item->refresh();

        event(new CreateOneAttributeEvent($user, $item));

        return $item;
    }

}