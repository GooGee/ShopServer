<?php

declare(strict_types=1);

namespace App\Ad\Admin\DeleteOne;

use App\Models\Admin;

use App\Repository\AdminRepository;

class DeleteOneAdmin
{
    public function __construct(private AdminRepository $repository)
    {
    }

    function __invoke(Admin $user, int $id)
    {
        $item = $this->repository->findOrFail($id);

        if ($item->dtDelete) {
            $item->dtDelete = null;
        } else {
            $item->dtDelete = now();
        }

        $item->save();

        event(new DeleteOneAdminEvent($user, $item));

        return $item;
    }
}