<?php

declare(strict_types=1);

namespace App\Ad\ModelHasPermission\CreateOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class CreateOneModelHasPermissionListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(CreateOneModelHasPermissionEvent $event)
    {
        Log::channel('admin')->info(CreateOneModelHasPermissionEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, CreateOneModelHasPermissionEvent::class, strval($event->item->id));
    }
}