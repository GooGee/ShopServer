<?php

declare(strict_types=1);

namespace App\Ad\Notification\DeleteOne;

use Illuminate\Support\Facades\Log;

class DeleteOneNotificationListener
{
    function handle(DeleteOneNotificationEvent $event)
    {
        Log::channel('admin')->info(DeleteOneNotificationEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}