<?php

declare(strict_types=1);

namespace App\Ad\Tag\CreateOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class CreateOneTagListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(CreateOneTagEvent $event)
    {
        Log::channel('admin')->info(CreateOneTagEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, CreateOneTagEvent::class, strval($event->item->id));
    }
}