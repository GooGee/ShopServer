<?php

declare(strict_types=1);

namespace App\Ad\Post\CreateOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class CreateOnePostListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(CreateOnePostEvent $event)
    {
        Log::channel('admin')->info(CreateOnePostEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, CreateOnePostEvent::class, strval($event->item->id));
    }
}