<?php

declare(strict_types=1);

namespace App\Ad\FileInfo\DeleteOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class DeleteOneFileInfoListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(DeleteOneFileInfoEvent $event)
    {
        Log::channel('admin')->info(DeleteOneFileInfoEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, DeleteOneFileInfoEvent::class, strval($event->item->id));
    }
}