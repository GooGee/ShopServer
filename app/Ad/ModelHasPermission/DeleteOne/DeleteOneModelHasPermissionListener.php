<?php

declare(strict_types=1);

namespace App\Ad\ModelHasPermission\DeleteOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class DeleteOneModelHasPermissionListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(DeleteOneModelHasPermissionEvent $event)
    {
        Log::channel('admin')->info(DeleteOneModelHasPermissionEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, DeleteOneModelHasPermissionEvent::class, strval($event->item->id));
    }
}