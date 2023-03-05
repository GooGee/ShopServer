<?php

declare(strict_types=1);

namespace App\Ad\Role\CreateOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class CreateOneRoleListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(CreateOneRoleEvent $event)
    {
        Log::channel('admin')->info(CreateOneRoleEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, CreateOneRoleEvent::class, strval($event->item->id));
    }
}