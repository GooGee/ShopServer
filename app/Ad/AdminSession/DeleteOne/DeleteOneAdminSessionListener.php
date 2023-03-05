<?php

declare(strict_types=1);

namespace App\Ad\AdminSession\DeleteOne;

use Illuminate\Support\Facades\Log;

class DeleteOneAdminSessionListener
{
    function handle(DeleteOneAdminSessionEvent $event)
    {
        Log::channel('admin')->info(DeleteOneAdminSessionEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}