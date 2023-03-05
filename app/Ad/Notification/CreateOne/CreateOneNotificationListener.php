<?php

declare(strict_types=1);

namespace App\Ad\Notification\CreateOne;

use Illuminate\Support\Facades\Log;

class CreateOneNotificationListener
{
    function handle(CreateOneNotificationEvent $event)
    {
        Log::channel('admin')->info(CreateOneNotificationEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}