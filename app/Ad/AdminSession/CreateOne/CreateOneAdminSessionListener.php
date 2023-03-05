<?php

declare(strict_types=1);

namespace App\Ad\AdminSession\CreateOne;

use Illuminate\Support\Facades\Log;

class CreateOneAdminSessionListener
{
    function handle(CreateOneAdminSessionEvent $event)
    {
        Log::channel('admin')->info(CreateOneAdminSessionEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}