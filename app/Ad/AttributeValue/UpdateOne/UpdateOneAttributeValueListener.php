<?php

declare(strict_types=1);

namespace App\Ad\AttributeValue\UpdateOne;

use Illuminate\Support\Facades\Log;

class UpdateOneAttributeValueListener
{
    function handle(UpdateOneAttributeValueEvent $event)
    {
        Log::channel('admin')->info(UpdateOneAttributeValueEvent::class, ['userId' => $event->user->id, 'id' => $event->item->id]);
    }
}