<?php

declare(strict_types=1);

namespace App\Ad\Attribute\CreateOne;

use Illuminate\Support\Facades\Log;

class CreateOneAttributeListener
{
    function handle(CreateOneAttributeEvent $event)
    {
        Log::channel('admin')->info(CreateOneAttributeEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}