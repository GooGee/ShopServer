<?php

declare(strict_types=1);

namespace App\Ad\Page\DeleteOne;

use App\Models\Admin;

use App\Repository\PageRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteOnePage
{
    public function __construct(private PageRepository $repository)
    {
    }

    function __invoke(Admin $user, int $id)
    {
        $item = $this->repository->findOrFail($id);

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }

        $item->dtDelete = now();
        $item->save();

        event(new DeleteOnePageEvent($user, $item));

        return $item;
    }
}