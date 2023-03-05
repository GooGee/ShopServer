<?php

declare(strict_types=1);

namespace App\Ad\Attribute\UpdateOne;

use Illuminate\Support\Facades\Log;

class UpdateOneAttributeListener
{
    function handle(UpdateOneAttributeEvent $event)
    {
        Log::channel('admin')->info(UpdateOneAttributeEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}