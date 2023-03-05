<?php

declare(strict_types=1);

namespace App\Ad\RoleHasPermission\CreateOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class CreateOneRoleHasPermissionListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(CreateOneRoleHasPermissionEvent $event)
    {
        Log::channel('admin')->info(CreateOneRoleHasPermissionEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, CreateOneRoleHasPermissionEvent::class, strval($event->item->id));
    }
}