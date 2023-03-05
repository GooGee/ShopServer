<?php

declare(strict_types=1);

namespace App\Ad\Admin\UpdateOne;

use App\Models\Admin;

use App\Repository\AdminRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateOneAdmin
{
    public function __construct(private AdminRepository $repository)
    {
    }

    function __invoke(int    $id, Admin $user,

                      string $password,)
    {
        $item = $this->repository->findOrFail($id);

        if ($item->dtDelete) {
            throw new NotFoundHttpException();
        }

        $item->password = bcrypt($password);

        $item->save();

        event(new UpdateOneAdminEvent($user, $item));

        return $item;
    }

}