<?php

declare(strict_types=1);

namespace App\Ad\Category\CreateOne;

use App\Models\Admin;

use App\Models\Category;
use App\Repository\CategoryRepository;

class CreateOneCategory
{
    public function __construct(private CategoryRepository $repository)
    {
    }

    function __invoke(Admin $user,

                      string $name,
                      ?int $parentId,
                      string $image,
    )
    {
        $item = new Category();

        $item->name = $name;
        $item->parentId = $parentId;
        $item->image = $image;

        $item->save();
        $item->refresh();

        event(new CreateOneCategoryEvent($user, $item));

        return $item;
    }

}