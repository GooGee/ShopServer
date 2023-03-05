<?php

declare(strict_types=1);

namespace App\Ad\Tag\CreateOne;

use App\Models\Admin;

use App\Models\Tag;
use App\Repository\TagRepository;

class CreateOneTag
{
    public function __construct(private TagRepository $repository)
    {
    }

    function __invoke(Admin $user,

                      string $name,
    )
    {
        $item = new Tag();

        $item->name = $name;

        $item->save();
        $item->refresh();

        event(new CreateOneTagEvent($user, $item));

        return $item;
    }

}