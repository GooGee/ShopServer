<?php

declare(strict_types=1);

namespace App\Ad\Tag\UpdateOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class UpdateOneTagListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(UpdateOneTagEvent $event)
    {
        Log::channel('admin')->info(UpdateOneTagEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, UpdateOneTagEvent::class, strval($event->item->id));
    }
}