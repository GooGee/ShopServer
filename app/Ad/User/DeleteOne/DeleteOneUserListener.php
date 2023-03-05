<?php

declare(strict_types=1);

namespace App\Ad\User\DeleteOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class DeleteOneUserListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(DeleteOneUserEvent $event)
    {
        Log::channel('admin')->info(DeleteOneUserEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, DeleteOneUserEvent::class, strval($event->item->id));
    }
}