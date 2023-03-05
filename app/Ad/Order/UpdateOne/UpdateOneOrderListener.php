<?php

declare(strict_types=1);

namespace App\Ad\Order\UpdateOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class UpdateOneOrderListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(UpdateOneOrderEvent $event)
    {
        Log::channel('admin')->info(UpdateOneOrderEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, UpdateOneOrderEvent::class, strval($event->item->id));
    }
}