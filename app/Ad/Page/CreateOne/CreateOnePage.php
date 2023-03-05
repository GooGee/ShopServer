<?php

declare(strict_types=1);

namespace App\Ad\Page\CreateOne;

use App\Models\Admin;

use App\Models\Page;
use App\Repository\PageRepository;

class CreateOnePage
{
    public function __construct(private PageRepository $repository)
    {
    }

    function __invoke(Admin $user,

                      string $title,
                      string $content,
    )
    {
        $item = new Page();

        $item->title = $title;
        $item->content = $content;

        $item->save();
        $item->refresh();

        event(new CreateOnePageEvent($user, $item));

        return $item;
    }

}