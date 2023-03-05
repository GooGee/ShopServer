<?php

declare(strict_types=1);

namespace App\Ad\Notification\UpdateOne;

use Illuminate\Support\Facades\Log;

class UpdateOneNotificationListener
{
    function handle(UpdateOneNotificationEvent $event)
    {
        Log::channel('admin')->info(UpdateOneNotificationEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}