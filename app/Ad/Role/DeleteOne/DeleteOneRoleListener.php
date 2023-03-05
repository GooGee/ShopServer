<?php

declare(strict_types=1);

namespace App\Ad\Role\DeleteOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class DeleteOneRoleListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(DeleteOneRoleEvent $event)
    {
        Log::channel('admin')->info(DeleteOneRoleEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, DeleteOneRoleEvent::class, strval($event->item->id));
    }
}