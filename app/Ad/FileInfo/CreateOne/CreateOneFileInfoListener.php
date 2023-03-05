<?php

declare(strict_types=1);

namespace App\Ad\FileInfo\CreateOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class CreateOneFileInfoListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(CreateOneFileInfoEvent $event)
    {
        Log::channel('admin')->info(CreateOneFileInfoEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, CreateOneFileInfoEvent::class, strval($event->item->id));
    }
}