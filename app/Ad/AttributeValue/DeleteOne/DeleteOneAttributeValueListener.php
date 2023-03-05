<?php

declare(strict_types=1);

namespace App\Ad\AttributeValue\DeleteOne;

use Illuminate\Support\Facades\Log;

class DeleteOneAttributeValueListener
{
    function handle(DeleteOneAttributeValueEvent $event)
    {
        Log::channel('admin')->info(DeleteOneAttributeValueEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}