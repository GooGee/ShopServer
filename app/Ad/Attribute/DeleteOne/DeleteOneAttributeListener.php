<?php

declare(strict_types=1);

namespace App\Ad\Attribute\DeleteOne;

use Illuminate\Support\Facades\Log;

class DeleteOneAttributeListener
{
    function handle(DeleteOneAttributeEvent $event)
    {
        Log::channel('admin')->info(DeleteOneAttributeEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}