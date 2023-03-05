<?php

declare(strict_types=1);

namespace App\Ad\AdminSession\DeleteOne;


use App\Models\Admin;
use App\Repository\AdminSessionRepository;

class DeleteOneAdminSession
{
    public function __construct(private AdminSessionRepository $repository)
    {
    }

    function __invoke(Admin $user, int $id)
    {
        $item = $this->repository->findRecent($user->id);
        if ($item) {
            $item->dtUpdate = now();
            $item->save();

            event(new DeleteOneAdminSessionEvent($user, $item));
        }
        return $item;
    }
}