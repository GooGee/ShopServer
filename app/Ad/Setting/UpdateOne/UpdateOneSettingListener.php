<?php

declare(strict_types=1);

namespace App\Ad\Setting\UpdateOne;

use App\Ad\Operation\CreateOne\CreateOneOperation;
use Illuminate\Support\Facades\Log;

class UpdateOneSettingListener
{
    public function __construct(private CreateOneOperation $createOneOperation)
    {
    }

    function handle(UpdateOneSettingEvent $event)
    {
        Log::channel('admin')->info(UpdateOneSettingEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
        $this->createOneOperation->__invoke($event->user, UpdateOneSettingEvent::class, strval($event->item->id));
    }
}