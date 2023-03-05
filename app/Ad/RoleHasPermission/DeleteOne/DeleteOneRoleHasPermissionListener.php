<?php

declare(strict_types=1);

namespace App\Ad\RoleHasPermission\DeleteOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class DeleteOneRoleHasPermissionListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(DeleteOneRoleHasPermissionEvent $event)
    {
        Log::channel('admin')->info(DeleteOneRoleHasPermissionEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, DeleteOneRoleHasPermissionEvent::class, strval($event->item->id));
    }
}