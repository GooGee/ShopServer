<?php

declare(strict_types=1);

namespace App\Ad\Tag\DeleteOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class DeleteOneTagListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(DeleteOneTagEvent $event)
    {
        Log::channel('admin')->info(DeleteOneTagEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, DeleteOneTagEvent::class, strval($event->item->id));
    }
}