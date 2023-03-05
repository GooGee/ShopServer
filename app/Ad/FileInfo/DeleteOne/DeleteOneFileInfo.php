<?php

declare(strict_types=1);

namespace App\Ad\FileInfo\DeleteOne;

use App\Models\Admin;

use App\Repository\FileInfoRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteOneFileInfo
{
    public function __construct(private FileInfoRepository $repository)
    {
    }

    function __invoke(Admin $user, int $id)
    {
        $item = $this->repository->findOrFail($id);

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }

        $item->delete();

        event(new DeleteOneFileInfoEvent($user, $item));

        return $item;
    }
}