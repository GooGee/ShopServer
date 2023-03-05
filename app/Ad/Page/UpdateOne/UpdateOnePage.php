<?php

declare(strict_types=1);

namespace App\Ad\Page\UpdateOne;

use App\Models\Admin;

use App\Repository\PageRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateOnePage
{
    public function __construct(private PageRepository $repository)
    {
    }

    function __invoke(int $id, Admin $user,

                      string $title,
                      string $content,)
    {
        $item = $this->repository->findOrFail($id);

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }


        $item->title = $title;
        $item->content = $content;

        $item->save();

        event(new UpdateOnePageEvent($user, $item));

        return $item;
    }

}