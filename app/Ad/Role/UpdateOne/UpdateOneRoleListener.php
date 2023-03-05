<?php

declare(strict_types=1);

namespace App\Ad\Role\UpdateOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class UpdateOneRoleListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(UpdateOneRoleEvent $event)
    {
        Log::channel('admin')->info(UpdateOneRoleEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, UpdateOneRoleEvent::class, strval($event->item->id));
    }
}