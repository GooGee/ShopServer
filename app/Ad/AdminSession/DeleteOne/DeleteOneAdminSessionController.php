<?php

declare(strict_types=1);

namespace App\Ad\AdminSession\DeleteOne;

use App\AbstractBase\AbstractController;
use App\AbstractBase\AbstractResponse;


class DeleteOneAdminSessionController extends AbstractController
{
    public function __invoke(int $id, DeleteOneAdminSession $delete)
    {
        /** @var \App\Models\Admin $user */
        $user = auth()->guard('admin')->user();

        auth()->guard('admin')->logout();

        $result = $delete($user, $id);

        return AbstractResponse::sendOK($result);
    }
}