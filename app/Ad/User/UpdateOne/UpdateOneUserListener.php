<?php

declare(strict_types=1);

namespace App\Ad\User\UpdateOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class UpdateOneUserListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(UpdateOneUserEvent $event)
    {
        Log::channel('admin')->info(UpdateOneUserEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, UpdateOneUserEvent::class, strval($event->item->id));
    }
}